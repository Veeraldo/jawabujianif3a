<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;


class BukuController extends Controller

{
    // Menampilkan semua data buku
    public function index()
    {
        // Ambil semua buku dari database
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    // Menampilkan form untuk menambahkan buku baru
    public function create()
    {
        return view('buku.create');
    }

    // Menyimpan data buku baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'Nama_Buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'Pengarang' => 'required|string|max:255',
            'Jumlah' => 'required|integer',
        ]);

        // Menyimpan data buku ke database
        Buku::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit buku berdasarkan ID
    public function edit($id)
    {
        $buku = Buku::findOrFail($id); // Menemukan buku berdasarkan ID
        return view('buku.edit', compact('buku')); // Mengirim data buku ke view
    }

    // Memperbarui data buku yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'Nama_Buku' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'Pengarang' => 'required|string|max:255',
            'Jumlah' => 'required|integer',
        ]);

        // Menemukan buku berdasarkan ID dan mengupdate datanya
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }

    // Menghapus buku berdasarkan ID
    public function destroy($id)
    {
        // Menemukan buku berdasarkan ID dan menghapusnya
        $buku = Buku::findOrFail($id);
        $buku->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }
}
