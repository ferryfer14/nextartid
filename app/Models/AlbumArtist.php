<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumSong extends Model
{
    protected $table = 'album_artist';

    protected $fillable = [
        'song_id', 'album_id','artist_role','artist_name'
    ];
}