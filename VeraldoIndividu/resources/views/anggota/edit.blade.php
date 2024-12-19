<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anggota</title>
    <!-- Menggunakan CDN Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Edit Anggota</h2>

    <form action="{{ route('anggota.update', $anggota->ID_Anggota) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="Nama_Anggota" class="form-label">Nama Anggota</label>
            <input type="text" name="Nama_Anggota" id="Nama_Anggota" value="{{ $anggota->Nama_Anggota }}" class="form-control @error('Nama_Anggota') is-invalid @enderror">
            @error('Nama_Anggota')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <input type="text" name="Alamat" id="Alamat" value="{{ $anggota->Alamat }}" class="form-control @error('Alamat') is-invalid @enderror">
            @error('Alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" value="{{ $anggota->jurusan }}" class="form-control @error('jurusan') is-invalid @enderror">
            @error('jurusan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tgl_daftar" class="form-label">Tanggal Daftar</label>
            <input type="date" name="tgl_daftar" id="tgl_daftar" value="{{ $anggota->tgl_daftar }}" class="form-control @error('tgl_daftar') is-invalid @enderror">
            @error('tgl_daftar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
