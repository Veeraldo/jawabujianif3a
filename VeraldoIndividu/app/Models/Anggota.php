<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota'; // Nama tabel
    protected $primaryKey = 'ID_Anggota'; // Primary key
    public $incrementing = true; // Jika ID_Anggota adalah auto-increment
    protected $keyType = 'int'; // Tipe data primary key

    protected $fillable = [
        'Nama_Anggota',
        'Alamat',
        'jurusan',
        'tgl_daftar',
    ];

    protected $casts = [
        'tgl_daftar' => 'date',
    ];
}
