<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_peminjaman extends Model
{
    use HasFactory;

    protected $table = 'detail_peminjaman'; // Nama tabel
    protected $fillable = [
        'no_peminjaman', 
        'ID_Anggota', 
        'ID_Buku', 
        'Tanggal_Pinjam', 
        'Tanggal_Kembali', 
        'Denda',
    ];

    // Relasi dengan anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'ID_Anggota');
    }

    // Relasi dengan buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'ID_Buku');
    }
}
