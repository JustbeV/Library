<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $fillable = [
    'title',
    'description',
    'status',
    'cover_image',
    'video',
];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
