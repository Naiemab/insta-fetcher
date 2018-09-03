<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class,'tag_id');
    }
}
