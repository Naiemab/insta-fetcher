<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_tag', 'tag_id', 'campaign_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class,'tag_id');
    }
}
