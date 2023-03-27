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
use App\Models\TransactionSubscribe;
use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class TransactionSubscribeController
{
    private $request;
    private $select;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $transaction = TransactionSubscribe::withoutGlobalScopes()->where('status','0')->orderBy('transactions_subscribe.id', 'desc');

        isset($_GET['q']) ? $term = $_GET['q'] : $term = '';
        $transaction = $transaction->join('users','users.id','transactions_subscribe.user_id');
        if($term) {
            $transaction = $transaction->whereRaw('users.email LIKE "%' . $term . '%" or transactions_subscribe.transaction_id LIKE "%' . $term . '%"');
        }

        $transaction = $transaction->paginate(20);

        return view('backend.transaction-subscribe.index')
            ->with('term', $term)
            ->with('transaction', $transaction);
    }

    public function paid()
    {
        $transaction = TransactionSubscribe::withoutGlobalScopes()->where('status','10')->orderBy('transactions_subscribe.id', 'desc');

        isset($_GET['term']) ? $term = $_GET['term'] : $term = '';
        isset($_GET['created_from']) ? $created_from = date('Y-m-d',strtotime($_GET['created_from'])) : $created_from = '1970-01-01';
        isset($_GET['created_until']) ? $created_until = date('Y-m-d', strtotime($_GET['created_until'])) : $created_until = date('Y-m-d');
        
        $transaction = $transaction->join('users','users.id','transactions_subscribe.user_id');
        $transaction = $transaction->whereRaw('users.email LIKE "%' . $term . '%" and date(transactions_subscribe.updated_at) >= "'.$created_from.'" and date(transactions_subscribe.updated_at) <= "'.$created_until.'"  or transactions_subscribe.transaction_id LIKE "%' . $term . '%" and date(transactions_subscribe.updated_at) >= "'.$created_from.'" and date(transactions_subscribe.updated_at) <= "'.$created_until.'"');
        

        $transaction = $transaction->paginate(20);

        return view('backend.transaction-subscribe.paid')
            ->with('term', $term)
            ->with('transaction', $transaction);
    }

    public function add()
    {
        return view('backend.transaction-subscribe.add');
    }

    public function addPost()
    {
        $this->request->validate([
            'email' => 'required',
            'amount' => 'required|numeric',
            'max_artist' => 'required|numeric',
            'album_pay' => 'required',
            'month' => 'required|numeric|max:12|min:1',
        ]);
        $transaction = new TransactionSubscribe();
        $transaction->user_id = $this->request->input('email');
        $transaction->amount = $this->request->input('amount');
        $transaction->max_artist = $this->request->input('max_artist');
        $transaction->album_pay = $this->request->input('album_pay');
        $transaction->month = $this->request->input('month');
        $transaction->save();
        $transaction->transaction_id = date('Ymd').$transaction->id;
        $transaction->save();
        return redirect()->route('backend.transaction.subscribe')->with('status', 'success')->with('message', 'Transaction successfully paid!');
    }

    public function edit()
    {
        $transaction = TransactionSubscribe::withoutGlobalScopes()->where('id',$this->request->route('id'))->first();

        return view('backend.transaction-subscribe.form')
            ->with('transaction', $transaction);
    }

    public function editPost()
    {
        $this->request->validate([
            'amount' => 'required|numeric',
            'note' => 'nullable|string'
        ]);

        $transaction = TransactionSubscribe::withoutGlobalScopes()->where('transaction_id', '=', $this->request->input('transaction_id'))->firstOrFail();
        if($this->request->input('amount') == 0 || $this->request->input('amount') == $transaction->amount){
            $user = User::withoutGlobalScopes()->findOrFail($transaction->user_id);
            $user->affiliation = 'Subscribe';
            $user->max_artist = $transaction->max_artist; 
            $user->album_pay = $transaction->album_pay; 
            $user->subscribe_month = $transaction->month; 
            $user->expired_date_subscribe = Carbon::now()->addMonths($transaction->month); 
            $user->save();
            $transaction->status = 1;
            $transaction->payment_type = 'Manual';
            $transaction->note = $this->request->input('note');
            if($this->request->input('amount') == 0){
                $transaction->status_free = 1;
            }
            $transaction->save();

            $timestamp = date('YMdHis');
            $trx_id = $transaction->transaction_id;
            $amount = $this->request->input('amount');
            $merchant_bill_ref = ($timestamp . $trx_id);
            $amount_payment = $amount;
            $res_signature = signature_youtap($trx_id, $amount_payment, $timestamp, $merchant_bill_ref);
            $signature = $res_signature['signature'];
            $minify_body = $res_signature['minify_body'];

            $payment = new Payment();
            $payment->transaction_type = 2;
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

            return redirect()->route('backend.transaction.subscribe')->with('status', 'success')->with('message', 'Transaction successfully paid!');
        }else{
            return redirect()->route('backend.transaction.subscribe.edit',['id'=>$transaction->id])->with('status', 'failed')->with('message', 'Amount must be a 0 or '.($transaction->amount).' !');
        }
    }

}