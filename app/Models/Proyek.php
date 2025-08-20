<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proyek extends Model
{
    protected $table = 'proyeks';

    protected $fillable = [
        'title',
        'description',
        'status',
        'start_date',
        'end_date',
        'repository_url',
        'student_id',
    ];

    public function student():BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
