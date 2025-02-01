<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuKembali extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'bukukembali';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'judul_buku',
        'penerbit',
        'keterangan',
    ];
}
