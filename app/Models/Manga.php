<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'cover_image', 'status'];

    // One manga has many chapters
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
