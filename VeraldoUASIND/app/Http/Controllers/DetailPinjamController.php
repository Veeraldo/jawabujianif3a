<?php

namespace App\Http\Controllers;

use App\Models\DetailPinjam;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;

class DetailPinjamController extends Controller
{
    // Display the list of detail pinjam (borrow details)
    public function index()
{
    // Ambil semua data detail pinjam yang terbaru
    $detailPinjam = DetailPinjam::all();
    return view('detailpinjam.index', compact('detailPinjam'));
}


    // Show the form to create a new detail pinjam (borrow detail)
    public function create()
    {
        $anggota = Anggota::all();
        $buku = Buku::all();
        return view('detailpinjam.create', compact('anggota', 'buku'));
    }

    // Store a new detail pinjam (borrow detail) record
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'No_Pinjam' => 'required|string|max:255|unique:detail_pinjam,No_Pinjam',
            'ID_Anggota' => 'required|exists:anggota,ID_Anggota',
            'ID_Buku' => 'required|exists:buku,ID_Buku',
            'Tgl_Pinjam' => 'required|date',
            'Tgl_Kembali' => 'nullable|date',
            'Denda' => 'required|numeric|min:0',  // Ensure that denda (penalty) is non-negative
        ]);

        // Create the detail pinjam (borrow detail) record using the validated data
        DetailPinjam::create($request->all());

        // Redirect to the detail pinjam index page with a success message
        return redirect()->route('detailpinjam.index')->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    // Show the form to edit an existing detail pinjam (borrow detail) record
    public function edit($No_Pinjam)
{
    // Mengambil detail pinjam berdasarkan No_Pinjam
    $detailPinjam = DetailPinjam::findOrFail($No_Pinjam);
    $anggota = Anggota::all();
    $buku = Buku::all();

    return view('detailpinjam.edit', compact('detailPinjam', 'anggota', 'buku'));
}



    // Update an existing detail pinjam (borrow detail) record
    public function update(Request $request, $No_Pinjam)
    {
        $request->validate([
            'ID_Anggota' => 'required|exists:anggota,ID_Anggota',
            'ID_Buku' => 'required|exists:buku,ID_Buku',
            'Tgl_Pinjam' => 'required|date',
            'Tgl_Kembali' => 'nullable|date',
            'Denda' => 'nullable|numeric|min:0',
        ]);
    
        $detailPinjam = DetailPinjam::findOrFail($No_Pinjam);
        $detailPinjam->update([
            'ID_Anggota' => $request->ID_Anggota,
            'ID_Buku' => $request->ID_Buku,
            'Tgl_Pinjam' => $request->Tgl_Pinjam,
            'Tgl_Kembali' => $request->Tgl_Kembali,
            'Denda' => $request->Denda,
        ]);
    
        return redirect()->route('detailpinjam.index')->with('success', 'Peminjaman berhasil diubah!');
    }
    

    // Delete a detail pinjam (borrow detail) record
    public function destroy($id)
{
    // Mencari data berdasarkan ID
    $detailPinjam = DetailPinjam::findOrFail($id);
    
    // Menghapus data
    $detailPinjam->delete();

    // Redirect dengan pesan sukses
    return redirect()->route('detailpinjam.index')->with('success', 'Peminjaman berhasil dihapus!');
}



}
