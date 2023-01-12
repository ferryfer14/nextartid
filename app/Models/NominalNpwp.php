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

class NominalNpwp extends Model
{
    use InteractsWithMedia, SanitizedRequest;

    protected $table = 'nominal_npwps';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['without_npwp','organization','individual'];

    protected static function boot()
    {
        parent::boot();
    }
}