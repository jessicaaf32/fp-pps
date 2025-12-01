<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_kelas',
        'judul_materi',
        'keterangan',
        'link',
    ];


    protected $table = 'materi';

}
 