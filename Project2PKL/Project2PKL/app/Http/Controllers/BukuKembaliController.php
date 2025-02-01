<?php

namespace App\Http\Controllers;

use App\Models\BukuKembali;
use Illuminate\Http\Request;

class BukuKembaliController extends Controller
{
    /**
     * Tampilkan semua data buku kembali.
     */
    public function index()
    {
        $bukuKembali = BukuKembali::all();
        return response()->json($bukuKembali);
    }

    /**
     * Tambah data buku kembali.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        $bukuKembali = BukuKembali::create($validatedData);
        return response()->json($bukuKembali, 201);
    }

    /**
     * Tampilkan data buku kembali berdasarkan ID.
     */
    public function show($id)
    {
        $bukuKembali = BukuKembali::find($id);

        if (!$bukuKembali) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($bukuKembali);
    }

    /**
     * Perbarui data buku kembali.
     */
    public function update(Request $request, $id)
    {
        $bukuKembali = BukuKembali::find($id);

        if (!$bukuKembali) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validatedData = $request->validate([
            'judul_buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        $bukuKembali->update($validatedData);
        return response()->json($bukuKembali);
    }

    /**
     * Hapus data buku kembali.
     */
    public function destroy($id)
    {
        $bukuKembali = BukuKembali::find($id);

        if (!$bukuKembali) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $bukuKembali->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
