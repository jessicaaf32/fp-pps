<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'keterangan',
        'gambar',
    ];


    protected $table = 'kelas';
    public $timestamps = false;

        // 👉 relasi ke materi
    public function materi()
    {
        return $this->hasMany(Materi::class, 'id_kelas');
    }

}
 