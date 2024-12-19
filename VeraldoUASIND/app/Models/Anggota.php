<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $primaryKey = 'ID_Anggota';
    public $incrementing = false;

    protected $fillable = [
        'ID_Anggota', 'Nama_Anggota', 'Alamat', 'Jurusan', 'Tgl_Daftar'
    ];

    public function detailPinjam()
    {
        return $this->hasMany(DetailPinjam::class, 'ID_Anggota', 'ID_Anggota');
    }
}

