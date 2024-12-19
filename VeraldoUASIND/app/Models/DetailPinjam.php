<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    use HasFactory;

    // Tentukan nama tabel secara eksplisit
    protected $table = 'detail_pinjam';

    // Tentukan kolom primary key
    protected $primaryKey = 'No_Pinjam';

    // Menonaktifkan auto-increment jika No_Pinjam bukan auto increment
    public $incrementing = false;

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = [
        'No_Pinjam', 'ID_Anggota', 'ID_Buku', 'Tgl_Pinjam', 'Tgl_Kembali', 'Denda'
    ];

    // Relasi: DetailPinjam milik Anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'ID_Anggota', 'ID_Anggota');
    }

    // Relasi: DetailPinjam milik Buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'ID_Buku', 'ID_Buku');
    }
}
