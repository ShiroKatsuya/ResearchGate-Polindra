<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perangkatlunak extends Model
{
    protected $table = 'perangkatlunaks';

    protected $fillable = [
        'name',
        'description',
        'repo_url',
        'website_url',
        'student_id',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
