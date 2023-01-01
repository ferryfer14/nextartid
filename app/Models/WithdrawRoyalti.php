<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-08-01
 * Time: 17:04
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WithdrawRoyalti extends Model
{
    protected $fillable = ['bank','name','account_number','value','status'];
}