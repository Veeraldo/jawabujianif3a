<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    // Display the list of buku (books)
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    // Show the form to create a new buku (book)
    public function create()
    {
        return view('buku.create');
    }

    // Store a new buku record in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'ID_Buku' => 'required|string|max:255|unique:buku,ID_Buku',  // Ensure ID_Buku is unique
            'Nama_Buku' => 'required|string|max:255',
            'Penerbit' => 'required|string|max:255',
            'Pengarang' => 'required|string|max:255',
            'Jumlah' => 'required|integer|min:1',  // Ensure positive quantity
        ]);

        // Create the buku (book) record using the validated data
        Buku::create($request->all());

        // Redirect to the buku index page with a success message
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // Show the form to edit an existing buku (book) record
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

    // Update an existing buku (book) record
    public function update(Request $request, $id)
    {
        // Find the buku by ID
        $buku = Buku::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'ID_Buku' => 'required|string|max:255|unique:buku,ID_Buku,' . $id,  // Allow the current ID_Buku to remain unchanged
            'Nama_Buku' => 'required|string|max:255',
            'Penerbit' => 'required|string|max:255',
            'Pengarang' => 'required|string|max:255',
            'Jumlah' => 'required|integer|min:1',  // Ensure positive quantity
        ]);

        // Update the buku (book) record with the validated data
        $buku->update($request->all());

        // Redirect to the buku index page with a success message
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }

    // Delete a buku (book) record
    public function destroy($id)
    {
        // Delete the buku (book) record by ID
        Buku::destroy($id);

        // Redirect to the buku index page with a success message
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }
}
