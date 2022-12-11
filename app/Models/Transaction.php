<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    protected $fillable = [
        'user_id', 'album_id','transaction_id','amount', 'status', 'voucher_id', 'nilai_voucher'
    ];

    public function getAlbumsAttribute($value)
    {
        return Album::where('id', $this->attributes['album_id'])->get();
    }

    public function getVouchersAttribute($value)
    {
        return Voucher::where('id', $this->attributes['voucher_id'])->get();
    }
}