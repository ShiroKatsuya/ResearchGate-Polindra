<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year_of_graduation',
        'email',
        'phone',
        'program_study',
    ];

    public function publications(): HasMany
    {
        return $this->hasMany(Publication::class);
    }

    public function publikasis(): HasMany
    {
        return $this->hasMany(publikasi::class);
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    public function software(): HasMany
    {
        return $this->hasMany(Software::class);
    }
}


