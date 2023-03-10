<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class LogEmail extends Model {

    protected $table = 'log_email';

    protected static function boot()
    {
        parent::boot();
    }

}
