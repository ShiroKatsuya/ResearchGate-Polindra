<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'title',
        'journal',
        'published_at',
        'doi',
        'url',
        'abstract',
        'keywords',
        'is_peer_reviewed',
    ];

    protected $casts = [
        'published_at' => 'date',
        'keywords' => 'array',
        'is_peer_reviewed' => 'boolean',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}


