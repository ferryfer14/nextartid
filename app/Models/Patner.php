<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-05-24
 * Time: 13:14
 */

namespace App\Models;

use App\Scopes\PriorityScope;
use App\Traits\SanitizedRequest;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Patner extends Model
{
    use InteractsWithMedia, SanitizedRequest;

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new PriorityScope);
    }
}