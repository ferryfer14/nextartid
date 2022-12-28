<?php
/**
 * Created by NiNaCoder.
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

class FileRoyalti extends Model
{
    use InteractsWithMedia, SanitizedRequest;

    protected $appends = [];

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['nama_file','note'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new PriorityScope);
    }
}