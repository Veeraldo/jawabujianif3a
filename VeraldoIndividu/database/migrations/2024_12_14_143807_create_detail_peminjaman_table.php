<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPeminjamanTable extends Migration
{
    public function up()
    {
        Schema::create('detail_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('no_peminjaman')->unique(); // Nomor Peminjaman
            $table->foreignId('ID_Anggota')->constrained('anggota')->onDelete('cascade');
            $table->foreignId('ID_Buku')->constrained('buku')->onDelete('cascade');
            $table->date('Tanggal_Pinjam');
            $table->date('Tanggal_Kembali')->nullable();
            $table->decimal('Denda', 8, 2)->default(0); // Kolom denda
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detail_peminjaman');
    }
}
