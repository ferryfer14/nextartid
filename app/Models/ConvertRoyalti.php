<?php
/**
 * Created by NextArt.
 * Date: 2019-08-01
 * Time: 17:04
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConvertRoyalti extends Model
{
    protected $appends = ['users'];
    protected $fillable = ['value','value_idr','value_tax','value_admin','value_total','status'];

    public function getUsersAttribute($value)
    {
        return User::withoutGlobalScopes()->select('name')->where('id', $this->attributes['user_id'])->first();
    }
}