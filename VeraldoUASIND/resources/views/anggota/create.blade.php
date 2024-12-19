<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Tambah Anggota</h2>

    <form action="{{ route('anggota.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="ID_Anggota" class="form-label">ID Anggota</label>
            <input type="text" name="ID_Anggota" id="ID_Anggota" class="form-control @error('ID_Anggota') is-invalid @enderror">
            @error('ID_Anggota')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Nama_Anggota" class="form-label">Nama Anggota</label>
            <input type="text" name="Nama_Anggota" id="Nama_Anggota" class="form-control @error('Nama_Anggota') is-invalid @enderror">
            @error('Nama_Anggota')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <input type="text" name="Alamat" id="Alamat" class="form-control @error('Alamat') is-invalid @enderror">
            @error('Alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Jurusan" class="form-label">Jurusan</label>
            <input type="text" name="Jurusan" id="Jurusan" class="form-control @error('Jurusan') is-invalid @enderror">
            @error('Jurusan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Tgl_Daftar" class="form-label">Tanggal Daftar</label>
            <input type="date" name="Tgl_Daftar" id="Tgl_Daftar" class="form-control @error('Tgl_Daftar') is-invalid @enderror">
            @error('Tgl_Daftar')
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
