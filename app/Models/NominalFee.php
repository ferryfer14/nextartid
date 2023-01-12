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

class NominalFee extends Model
{
    use InteractsWithMedia, SanitizedRequest;

    protected $table = 'nominal_fee';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = ['fee_withdraw','exchange_rate_gap','min_convert'];

    protected static function boot()
    {
        parent::boot();
    }
}