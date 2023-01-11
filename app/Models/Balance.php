<?php
/**
 * Created by NextArt.
 * Date: 2019-05-24
 * Time: 13:14
 */

namespace App\Models;

use App\Scopes\PriorityScope;
use App\Traits\SanitizedRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;

class Balance extends Model
{
    use InteractsWithMedia, SanitizedRequest;

    protected $table = 'balance';

    protected $appends = [];

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['user_id','jenis','value','status'];

    protected static function boot()
    {
        parent::boot();
    }
}