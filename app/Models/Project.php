<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'title',
        'description',
        'repository_url',
        'website_url',
        'status',
        'start_date',
        'end_date',
        'tags',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'tags' => 'array',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}


