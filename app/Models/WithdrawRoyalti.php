<?php
/**
 * Created by NextArt.
 * Date: 2019-08-01
 * Time: 17:04
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WithdrawRoyalti extends Model
{
    protected $appends = ['users'];
    protected $fillable = ['bank','name','account_number','value','status'];

    public function getUsersAttribute($value)
    {
        return User::withoutGlobalScopes()->select('name')->where('id', $this->attributes['user_id'])->first();
    }
}