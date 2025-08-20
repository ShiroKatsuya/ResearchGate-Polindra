<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Software extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'name',
        'description',
        'repo_url',
        'website_url',
        'license',
        'tech_stack',
        'version',
        'screenshots',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'screenshots' => 'array',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}


