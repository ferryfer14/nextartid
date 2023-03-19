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

class Royalti extends Model
{
    use InteractsWithMedia, SanitizedRequest;

    protected $appends = [];

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['song_id', 'patner', 'value', 'start_date', 'end_date', 'country'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new PriorityScope);
    }
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}