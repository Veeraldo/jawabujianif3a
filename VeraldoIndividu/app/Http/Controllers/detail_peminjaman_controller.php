<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\detail_peminjaman;
use Illuminate\Http\Request;

class detail_peminjaman_controller extends Controller
{
    // Menampilkan form untuk menambah peminjaman
    public function create()
    {
        $anggota = Anggota::all();
        $buku = Buku::all();
        return view('detail_peminjaman.create', compact('anggota', 'buku'));
    }

    // Menyimpan data detail peminjaman
    public function store(Request $request)
    {
        $validated = $request->validate([
            'No_Peminjaman' => 'required|unique:detail_peminjaman,No_Peminjaman',
            'ID_Anggota' => 'required|exists:anggota,ID_Anggota',
            'ID_Buku' => 'required|exists:buku,ID_Buku',
            'Tanggal_Pinjam' => 'required|date',
            'Tanggal_Kembali' => 'nullable|date',
            'Denda' => 'nullable|numeric',
        ]);

        // Menyimpan data peminjaman
        $detailPeminjaman = new detail_peminjaman();
        $detailPeminjaman->No_Peminjaman = $request->No_Peminjaman;
        $detailPeminjaman->ID_Anggota = $request->ID_Anggota;
        $detailPeminjaman->ID_Buku = $request->ID_Buku;
        $detailPeminjaman->Tanggal_Pinjam = $request->Tanggal_Pinjam;
        $detailPeminjaman->Tanggal_Kembali = $request->Tanggal_Kembali;
        $detailPeminjaman->Denda = $request->Denda;
        $detailPeminjaman->save();

        return redirect()->route('detailpeminjaman.index')->with('success', 'Detail Peminjaman berhasil ditambahkan');
    }

    // Menampilkan semua detail peminjaman
    public function index()
    {
        $detailPeminjaman = detail_peminjaman::with('anggota', 'buku')->get();
        return view('detail_peminjaman.index', compact('detailPeminjaman'));
    }

    // Menampilkan form edit untuk detail peminjaman
    public function edit($id)
    {
        $detailPeminjaman = detail_peminjaman::findOrFail($id);
        $anggota = Anggota::all();
        $buku = Buku::all();
        return view('detail_peminjaman.edit', compact('detailPeminjaman', 'anggota', 'buku'));
    }

    // Update detail peminjaman
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'No_Peminjaman' => 'required|unique:detail_peminjaman,No_Peminjaman,' . $id,
            'ID_Anggota' => 'required|exists:anggota,ID_Anggota',
            'ID_Buku' => 'required|exists:buku,ID_Buku',
            'Tanggal_Pinjam' => 'required|date',
            'Tanggal_Kembali' => 'nullable|date',
            'Denda' => 'nullable|numeric',
        ]);

        $detailPeminjaman = detail_peminjaman::findOrFail($id);
        $detailPeminjaman->No_Peminjaman = $request->No_Peminjaman;
        $detailPeminjaman->ID_Anggota = $request->ID_Anggota;
        $detailPeminjaman->ID_Buku = $request->ID_Buku;
        $detailPeminjaman->Tanggal_Pinjam = $request->Tanggal_Pinjam;
        $detailPeminjaman->Tanggal_Kembali = $request->Tanggal_Kembali;
        $detailPeminjaman->Denda = $request->Denda;
        $detailPeminjaman->save();

        return redirect()->route('detailpeminjaman.index')->with('success', 'Detail Peminjaman berhasil diperbarui');
    }

    // Menghapus detail peminjaman
    public function destroy($id)
    {
        $detailPeminjaman = detail_peminjaman::findOrFail($id);
        $detailPeminjaman->delete();

        return redirect()->route('detailpeminjaman.index')->with('success', 'Detail Peminjaman berhasil dihapus');
    }
}
