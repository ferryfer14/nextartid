<?php


namespace App\Models;

use App\Scopes\ApprovedScope;
use App\Scopes\PublishedScope;
use App\Scopes\VisibilityScope;
use App\Traits\SanitizedRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Module;

class ArtistsRoles extends Model
{
    use InteractsWithMedia, SanitizedRequest;

    protected $appends = ['user_id','album_id'];

    protected $hidden = ['created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new VisibilityScope);
        static::addGlobalScope(new ApprovedScope);
        static::addGlobalScope(new PublishedScope);
    }
}
