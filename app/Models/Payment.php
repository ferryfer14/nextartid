<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $fillable = [
        'transaction_id', 'merchant_bill_ref','minify_body','signature', 'open_bill_id','amount', 'bill_status','timestamp'
    ];

}