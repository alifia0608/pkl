<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_buku'; // Primary key

    protected $table = 'buku'; // Nama tabel di database

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'judul_buku',
        'penerbit',
        'tanggal_pinjam',
        'tanggal_pengembalian',
    ];

    /**
     * Relasi One-to-One dengan model Pengembalian
     */
    public function pengembalians()
    {
        return $this->hasMany(Pengembalian::class, 'buku_id', 'id_buku');
    }
}
