<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class Anggota_Controller extends Controller
{
    // Menampilkan semua anggota
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }

    // Menyimpan data anggota baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nama_Anggota' => 'required|string|max:255',
            'Alamat' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'tgl_daftar' => 'required|date',
        ]);

        Anggota::create($validated);
        return redirect()->route('anggota.index');
    }

    // Menampilkan form untuk membuat anggota baru
    public function create()
    {
        return view('anggota.create');
    }

    // Menampilkan anggota berdasarkan ID
    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota.show', compact('anggota'));
    }

    // Mengupdate data anggota
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Nama_Anggota' => 'string|max:255',
            'Alamat' => 'string|max:255',
            'jurusan' => 'string|max:255',
            'tgl_daftar' => 'date',
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($validated);
        return redirect()->route('anggota.index');
    }

    // Menghapus anggota berdasarkan ID
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect()->route('anggota.index');
    }
    public function edit($id)
    {
    $anggota = Anggota::findOrFail($id);
    return view('anggota.edit', compact('anggota'));
    }

}
