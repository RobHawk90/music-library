<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['name', 'image', 'genre', 'description'];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
