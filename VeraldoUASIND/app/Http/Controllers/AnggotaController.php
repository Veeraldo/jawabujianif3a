<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    // Display the list of anggota
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', compact('anggota'));
    }
    
    public function create()
    {
        return view('anggota.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'ID_Anggota' => 'required|string|max:255|unique:anggota,ID_Anggota',
            'Nama_Anggota' => 'required|string|max:255',
            'Alamat' => 'required|string',
            'Jurusan' => 'required|string',
            'Tgl_Daftar' => 'required|date',
        ]);
    
        Anggota::create($request->all());
    
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan');
    }
    
    public function edit($id)
{
    $anggota = Anggota::findOrFail($id); // Make sure the ID matches your primary key
    return view('anggota.edit', compact('anggota')); // Passing the $anggota variable to the view
}

    
    public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);
    
        $request->validate([
            'ID_Anggota' => 'required|string|max:255|unique:anggota,ID_Anggota,' . $id,
            'Nama_Anggota' => 'required|string|max:255',
            'Alamat' => 'required|string',
            'Jurusan' => 'required|string',
            'Tgl_Daftar' => 'required|date',
        ]);
    
        $anggota->update($request->all());
    
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui');
    }
    
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
    
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus');
    }
    
    
}
