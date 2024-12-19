<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Specify the table name explicitly
    protected $table = 'buku';

    // Specify the primary key column
    protected $primaryKey = 'ID_Buku';

    // Indicate that the primary key is not an auto-incrementing integer (if applicable)
    public $incrementing = false;

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'ID_Buku', 'Nama_Buku', 'Penerbit', 'Pengarang', 'Jumlah'
    ];

    // Define the relationship: A Buku can have many DetailPinjam (borrow details)
    public function detailPinjam()
    {
        return $this->hasMany(DetailPinjam::class, 'ID_Buku', 'ID_Buku');
    }
}
