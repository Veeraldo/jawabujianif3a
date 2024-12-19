<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model
    protected $table = 'buku'; // Nama tabel sesuai dengan yang ada di database

    // Menentukan kolom primary key
    protected $primaryKey = 'ID_Buku'; // Menentukan bahwa primary key adalah ID_Buku

    // Menentukan kolom yang bisa diisi
    protected $fillable = [
        'Nama_Buku',
        'penerbit',
        'Pengarang',
        'Jumlah',
    ];

    // Menentukan kolom yang tidak bisa diubah
    protected $guarded = [];

    // Mengatur format tanggal
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Relasi dengan model lain (contoh: relasi dengan DetailPeminjaman)
    public function detailPeminjaman()
    {
        return $this->hasMany(detail_peminjaman::class, 'ID_Buku', 'ID_Buku');
    }
}
