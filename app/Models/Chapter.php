<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['manga_id', 'chapter_number', 'title', 'content'];

    public function manga()
    {
        return $this->belongsTo(Manga::class);
    }
}
