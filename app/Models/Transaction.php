<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $appends = ['albums', 'payments', 'vouchers'];
    protected $fillable = [
        'id','user_id', 'album_id','transaction_id','amount', 'status', 'voucher_id', 'nilai_voucher','free_song_id', 'nilai_free_song', 'payment_type' 
    ];

    public function getAlbumsAttribute($value)
    {
        return Album::withoutGlobalScopes()->where('id', $this->attributes['album_id'])->first();
    }

    public function getUsersAttribute($value)
    {
        return User::findOrFail($this->attributes['user_id']);
    }

    public function getPaymentsAttribute($value)
    {
        return Payment::where('transaction_id', $this->attributes['transaction_id'])->orderBy('created_at','DESC')->groupBy('transaction_id')->first();
    }

    public function getVouchersAttribute($value)
    {
        return Voucher::where('id', $this->attributes['voucher_id'])->first();
    }

}