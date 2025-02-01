<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function return(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tanggal_pengembalian' => 'required|date_format:Y-m-d', // Tanggal wajib ada dan formatnya YYYY-MM-DD
        ]);

        // Cari buku berdasarkan ID
        $buku = Buku::findOrFail($id);

        // Update tanggal pengembalian
        $buku->update([
            'tanggal_pengembalian' => $request->input('tanggal_pengembalian'),
        ]);

        // Response dengan detail pengembalian
        return response()->json([
            'id_buku' => $buku->id_buku,
            'judul_buku' => $buku->judul_buku,
            'penerbit' => $buku->penerbit,
            'tanggal_pinjam' => $buku->tanggal_pinjam,
            'tanggal_pengembalian' => $buku->tanggal_pengembalian,
            'message' => 'Buku berhasil dikembalikan!',
        ], 200);
    }
}
