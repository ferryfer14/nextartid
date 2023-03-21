<?php
/**
 * Created by NextArt.
 * Date: 2019-08-01
 * Time: 17:04
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use App\Traits\SanitizedRequest;

class Voucher extends Model implements HasMedia
{
    use InteractsWithMedia, SanitizedRequest;

    protected $appends = ['artwork_url'];
    protected $fillable = ['code', 'type','amount', 'description', 'usage_limit', 'minimum_spend', 'maximum_spend', 'access', 'expired_at', 'user'];


    protected static function boot()
    {
        parent::boot();
    }

    
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('sm')
            ->width(60)
            ->height(60)
            ->performOnCollections('artwork')->nonOptimized()->nonQueued();

        $this->addMediaConversion('md')
            ->width(120)
            ->height(120)
            ->performOnCollections('artwork')->nonOptimized()->nonQueued();

        $this->addMediaConversion('lg')
            ->width(300)
            ->height(300)
            ->performOnCollections('artwork')->nonOptimized()->nonQueued();
    }

    public function getArtworkUrlAttribute($value)
    {
        $media = $this->getFirstMedia('artwork');
        if(! $media) {
            return asset( 'common/default/song.png');
        } else {
            if($media->disk == 's3') {
                return $media->getTemporaryUrl(Carbon::now()->addMinutes(intval(config('settings.s3_signed_time', 5))),'lg');
            } else {
                return $media->getFullUrl('lg');
            }
        }
    }
}