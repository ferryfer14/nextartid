<?php
/**
 * Created by NextArt.
 * Date: 2019-08-06
 * Time: 23:14
 */

namespace App\Http\Controllers\Backend;

use App\Models\Album;
use App\Models\Order;
use App\Models\Email;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;
use DB;

class PendingController
{
    private $request;
    private $select;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $transaction = Transaction::withoutGlobalScopes()->where('status','0')->orderBy('transaction.id', 'desc');

        isset($_GET['q']) ? $term = $_GET['q'] : $term = '';
        $transaction = $transaction->join('albums','albums.id','transaction.album_id');
        if($term) {
            $transaction = $transaction->whereRaw('albums.title LIKE "%' . $term . '%" or transaction.transaction_id LIKE "%' . $term . '%"');
        }

        $transaction = $transaction->paginate(20);

        return view('backend.pending.index')
            ->with('term', $term)
            ->with('pending', $transaction);
    }

    public function edit()
    {
        $pending = Transaction::withoutGlobalScopes()->where('transaction_id',$this->request->route('id'))->first();

        return view('backend.pending.form')
            ->with('pending', $pending);
    }

    public function editPost()
    {
        $this->request->validate([
            'amount' => 'required|numeric',
            'note' => 'nullable|string'
        ]);

        $transaction = Transaction::withoutGlobalScopes()->where('transaction_id', '=', $this->request->input('transaction_id'))->firstOrFail();
        if($this->request->input('amount') == 0 || $this->request->input('amount') == $transaction->amount-$transaction->nilai_voucher-$transaction->nilai_free_song){
            $album = Album::withoutGlobalScopes()->findOrFail($transaction->album_id);
            $album->paid = 1;
            $album->ref = $transaction->transaction_id; 
            $album->save();
            $transaction->status = 1;
            $transaction->payment_type = 'Manual';
            $transaction->note = $this->request->input('note');
            if($this->request->input('amount') == 0){
                if($transaction->voucher_id != null){
                    $voucher =  Voucher::where('id', $transaction->voucher_id)->first();
                    $voucher->use_count = $voucher->use_count-1;
                    $voucher->save();
                }
                if($transaction->free_song_id != null){
                    $transaction->nilai_free_song = 0;
                    $transaction->free_song_id = NULL;
                }
                $transaction->nilai_voucher = 0;
                $transaction->status_free = 1;
                $transaction->voucher_id = NULL;
            }
            $transaction->save();

            $timestamp = date('YMdHis');
            $trx_id = $transaction->transaction_id;
            $amount = $this->request->input('amount');
            $merchant_bill_ref = ($timestamp . $trx_id);
            $amount_payment = $amount - $transaction->nilai_voucher;
            $res_signature = signature_youtap($trx_id, $amount_payment, $timestamp, $merchant_bill_ref);
            $signature = $res_signature['signature'];
            $minify_body = $res_signature['minify_body'];

            $payment = new Payment();
            $payment->transaction_id = $trx_id;
            $payment->merchant_bill_ref = $merchant_bill_ref;
            $payment->minify_body = $minify_body;
            $payment->signature = $signature;
            $payment->amount = $amount_payment;
            $payment->open_bill_id = '';
            $payment->bill_status = 'Paid';
            $payment->save();

            $transaction->fill($this->request->except('_token'));

            $transaction->save();
            $user = User::withoutGlobalScopes()->where('id',$transaction->user_id)->first();
            (new Email)->paymentHasBeenPaid($user, 'Rp ' . number_format((float)($amount_payment), 0, ',', '.'));

            return redirect()->route('backend.pending')->with('status', 'success')->with('message', 'Transaction successfully paid!');
        }else{
            return redirect()->route('backend.pending.edit',['id'=>$transaction->transaction_id])->with('status', 'failed')->with('message', 'Amount must be a 0 or '.($transaction->amount-$transaction->nilai_voucher-$transaction->nilai_free_song).' !');
        }
    }

}