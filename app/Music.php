<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = ['name', 'duration', 'order', 'composer', 'album_id'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
