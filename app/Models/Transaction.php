<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    protected $fillable = [
        'user_id', 'album_id','transaction_id','amount', 'status'
    ];

    public function getAlbumsAttribute($value)
    {
        return AlbumSong::where('album_id', $this->attributes['album_id'])->get();
    }

}