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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'campaign_tag', 'campaign_id', 'tag_id');
    }
}
