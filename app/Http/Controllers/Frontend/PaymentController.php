<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-06-30
 * Time: 19:31
 */

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Lang;
use App;
use App\Models\Album;
use App\Models\Payment;
use App\Models\Transaction;
use Filesystem;
use File;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class PaymentController
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function notificationCallback()
    {
        $validation = Validator::make($this->request->all(),[
            'merchant' => 'required|string',
            'terminal' => 'required|string',
            'yt_trx_id' => 'required|string',
            'external_trx_id' => 'required|string',
            'merchant_bill_ref' => 'required|string',
            'amount' => 'required|int',
            'currency_code' => 'required|string',
        ]);
        if($validation->fails()){
            return response()->json([
                'success'   => false,
                'message'   => 'Validation errors',
                'data'      => $validation->errors()
            ]); 
        }else{
            $payment = Payment::where('merchant_bill_ref',$this->request->input('merchant_bill_ref'))->first();
            $payment->bill_status = 'Paid';
            $payment->save();
            $transaction = Transaction::withoutGlobalScopes()->where('transaction_id',$payment->transaction_id)->first();
            $transaction->status = 1;
            $transaction->save();
            $album = Album::withoutGlobalScopes()->where('id',$transaction->album_id)->first();
            $album->paid = 1;
            $album->ref = $this->request->input('yt_trx_id');
            $album->save();
            return response()->json([
                'success' => true,
                'status_code' => 00,
                'message' => 'Transaction success'
            ],200);
        }
    }
}