<?php
/**
 * Created by NextArt.
 * Date: 2019-05-24
 * Time: 13:14
 */

namespace App\Models;

use App\Scopes\PriorityScope;
use App\Traits\SanitizedRequest;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class ConfigPoint extends Model
{
    use InteractsWithMedia, SanitizedRequest;

    protected $table = 'config_point';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['point','idr', 'cal_idr'];

    protected static function boot()
    {
        parent::boot();
    }
}