<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Detail Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Tambah Detail Peminjaman</h2>

    <form action="{{ route('detailpinjam.store') }}" method="POST">
        @csrf
<div class="mb-3">
            <label for="No_Pinjam" class="form-label">No Peminjaman</label>
            <input type="text" name="No_Pinjam" id="No_Pinjam" class="form-control @error('No_Pinjam') is-invalid @enderror" value="{{ old('No_Pinjam') }}">
            @error('No_Pinjam')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="ID_Anggota" class="form-label">ID Anggota</label>
            <select name="ID_Anggota" id="ID_Anggota" class="form-select @error('ID_Anggota') is-invalid @enderror">
                <option value="">Pilih ID Anggota</option>
                @foreach($anggota as $anggota)
                    <option value="{{ $anggota->ID_Anggota }}" {{ old('ID_Anggota') == $anggota->ID_Anggota ? 'selected' : '' }}>{{ $anggota->ID_Anggota }}</option>
                @endforeach
            </select>
            @error('ID_Anggota')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="ID_Buku" class="form-label">ID Buku</label>
            <select name="ID_Buku" id="ID_Buku" class="form-select @error('ID_Buku') is-invalid @enderror">
                <option value="">Pilih ID Buku</option>
                @foreach($buku as $buku)
                    <option value="{{ $buku->ID_Buku }}" {{ old('ID_Buku') == $buku->ID_Buku ? 'selected' : '' }}>{{ $buku->ID_Buku }}</option>
                @endforeach
            </select>
            @error('ID_Buku')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="Tgl_Pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="Tgl_Pinjam" id="Tgl_Pinjam" class="form-control @error('Tgl_Pinjam') is-invalid @enderror" value="{{ old('Tgl_Pinjam') }}">
            @error('Tgl_Pinjam')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('detailpinjam.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
