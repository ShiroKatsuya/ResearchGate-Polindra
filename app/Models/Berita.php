<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Berita extends Model
{
    protected $table = 'beritas';

    protected $fillable = [
        'title',
        'content',
        'category_id',
        'published_at',
        'slug',
    ];

    protected $dates = [
        'published_at',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(NewsCategory::class, 'category_id');
    }
}

