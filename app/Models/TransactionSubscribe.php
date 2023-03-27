<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionSubscribe extends Model
{
    protected $table = 'transactions_subscribe';
    protected $appends = ['payments', 'users'];
    protected $fillable = [
        'id','user_id','transaction_id','amount', 'month', 'yt_trx_id', 'status', 'payment_type' 
    ];

    public function getUsersAttribute($value)
    {
        return User::findOrFail($this->attributes['user_id']);
    }

    public function getPaymentsAttribute($value)
    {
        return Payment::where('transaction_type', 2)->where('transaction_id', $this->attributes['transaction_id'])->orderBy('created_at','DESC')->groupBy('transaction_id')->first();
    }

}