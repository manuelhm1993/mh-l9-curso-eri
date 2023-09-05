<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGame extends Model
{
    use HasFactory;

    /**
     * Get the category that owns the videoGame.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
