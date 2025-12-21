<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'subtitle',
        'description',
        'date',
        'time_start',
        'time_end',
        'webinar_type',
        'poster_url',
        'link',
    ];

    public $timestamps = false;

    protected $table = 'webinar';

}
 