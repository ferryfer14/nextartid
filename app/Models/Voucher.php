<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-08-01
 * Time: 17:04
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['code', 'type','amount', 'description', 'usage_limit', 'minimum_spend', 'maximum_spend', 'access', 'expired_at'];
}