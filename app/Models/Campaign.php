<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed name
 */
class Campaign extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $fillable = [];
    protected $dates = ['deleted_at'];
}
