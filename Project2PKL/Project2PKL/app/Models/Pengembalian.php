<?php
// app/Models/Pengembalian.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'buku_id',
        'keterangan',
    ];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}
