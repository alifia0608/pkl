<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BukuController extends Controller
{
    // Fungsi untuk menyimpan data buku
    public function store(Request $request)
    {
        $request->validate([
            'judul_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date_format:d-m-Y',
        ]);

        $tanggalPinjam = Carbon::createFromFormat('d-m-Y', $request->tanggal_pinjam)->format('Y-m-d');

        $buku = Buku::create([
            'judul_buku' => $request->judul_buku,
            'penerbit' => $request->penerbit,
            'tanggal_pinjam' => $tanggalPinjam,
        ]);

        return response()->json([
            'id_buku' => $buku->id_buku,
            'judul_buku' => $buku->judul_buku,
            'penerbit' => $buku->penerbit,
            'tanggal_pinjam' => $buku->tanggal_pinjam,
            'tanggal_pengembalian' => $buku->tanggal_pengembalian,
            'created_at' => $buku->created_at,
            'updated_at' => $buku->updated_at,
            'message' => 'Data buku berhasil ditambahkan!',
        ], 201);
    }

    // Fungsi untuk memperbarui data buku
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tanggal_pinjam' => 'required|date_format:Y-m-d',
        ]);

        $buku = Buku::findOrFail($id);

        $buku->update([
            'judul_buku' => $request->judul_buku,
            'penerbit' => $request->penerbit,
            'tanggal_pinjam' => $request->tanggal_pinjam,
        ]);

        return response()->json([
            'id_buku' => $buku->id_buku,
            'judul_buku' => $buku->judul_buku,
            'penerbit' => $buku->penerbit,
            'tanggal_pinjam' => $buku->tanggal_pinjam,
            'tanggal_pengembalian' => $buku->tanggal_pengembalian,
            'updated_at' => $buku->updated_at,
            'message' => 'Data buku berhasil diperbarui!',
        ], 200);
    }

    // Fungsi untuk menampilkan semua data buku
    public function index()
    {
        $bukus = Buku::with('pengembalians')->get();

        $data = $bukus->map(function ($buku) {
            $batasPinjam = Carbon::createFromFormat('Y-m-d', $buku->tanggal_pinjam)->addDays(7);
            $tanggalKembali = $buku->tanggal_pengembalian ? Carbon::createFromFormat('Y-m-d', $buku->tanggal_pengembalian) : null;
            $keterlambatan = $tanggalKembali && $tanggalKembali->greaterThan($batasPinjam)
                ? $tanggalKembali->diffInDays($batasPinjam) . ' hari'
                : 'Tidak ada keterlambatan';

            return [
                'id_buku' => $buku->id_buku,
                'judul_buku' => $buku->judul_buku,
                'penerbit' => $buku->penerbit,
                'tanggal_pinjam' => $buku->tanggal_pinjam,
                'tanggal_pengembalian' => $buku->tanggal_pengembalian,
                'keterlambatan' => $keterlambatan,
                'updated_at' => $buku->updated_at,
            ];
        });

        return response()->json([
            'data' => $data,
            'message' => 'Data buku berhasil ditampilkan!',
        ], 200);
    }

    // Fungsi untuk mengembalikan buku
    public function return(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $tanggalPengembalian = $request->input('tanggal_pengembalian', Carbon::now()->format('Y-m-d'));

        $buku->update([
            'tanggal_pengembalian' => $tanggalPengembalian,
        ]);

        return response()->json([
            'id_buku' => $buku->id_buku,
            'judul_buku' => $buku->judul_buku,
            'penerbit' => $buku->penerbit,
            'tanggal_pinjam' => $buku->tanggal_pinjam,
            'tanggal_pengembalian' => $buku->tanggal_pengembalian,
            'updated_at' => $buku->updated_at,
            'message' => 'Buku berhasil dikembalikan!',
        ], 200);

    }
     // Fungsi untuk menghapus data buku
     public function destroy($id)
     {
         $buku = Buku::find($id);

         if (!$buku) {
             return response()->json([
                 'message' => 'Data buku tidak ditemukan!',
             ], 404);
         }

         $buku->delete();

         return response()->json([
             'message' => 'Data buku berhasil dihapus!',
         ], 200);
}
}
