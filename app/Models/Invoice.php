<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'email', 'telepon', 'pembayaran', 'rekening','alamat','ket'];
    use HasFactory;
}
