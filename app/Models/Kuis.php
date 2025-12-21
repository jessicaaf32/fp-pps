<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'quiz_slug',
        'user_name',
        'score',
        'time_spent',
        'created_at',
        'updated_at',
    ];


    protected $table = 'highscores';

}
 