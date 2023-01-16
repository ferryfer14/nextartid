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

class RoyaltiUnconfirm extends Model
{
    use InteractsWithMedia, SanitizedRequest;

    protected $appends = ['song'];

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['song_id', 'patner', 'value', 'start_date', 'end_date', 'country'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new PriorityScope);
    }

    public function getSongAttribute($value)
    {
        return Song::withoutGlobalScopes()->where('id', $this->attributes['song_id'])->first();
    }
}