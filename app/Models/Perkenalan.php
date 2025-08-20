<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perkenalan extends Model
{
    protected $table = 'perkenalans';

    protected $fillable = [
        'name',
        'program_study',
        'year_of_graduation',
        'email',
        'phone',
    ];
}
