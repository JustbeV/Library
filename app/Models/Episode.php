<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    // Optional: if your table name is 'episodes' (default), you can skip this
    protected $table = 'episodes';

    // Fillable fields for mass assignment
    protected $fillable = [
        'anime_id',
        'title',
        'video_url',       // path or URL to the video
        'episode_number',  // integer
    ];

    /**
     * An episode belongs to an anime
     */
    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }
}