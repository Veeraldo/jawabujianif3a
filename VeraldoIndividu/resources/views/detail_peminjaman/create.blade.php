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
    <form action="{{ route('detailpeminjaman.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="No_Peminjaman" class="form-label">No Peminjaman</label>
            <input type="text" name="No_Peminjaman" id="No_Peminjaman" class="form-control @error('No_Peminjaman') is-invalid @enderror" value="{{ old('No_Peminjaman') }}">
            @error('No_Peminjaman')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="ID_Anggota" class="form-label">Nama Anggota</label>
            <select name="ID_Anggota" id="ID_Anggota" class="form-select @error('ID_Anggota') is-invalid @enderror">
                <option value="">Pilih Anggota</option>
                @foreach($anggota as $ang)
                    <option value="{{ $ang->ID_Anggota }}" {{ old('ID_Anggota') == $ang->ID_Anggota ? 'selected' : '' }}>{{ $ang->Nama_Anggota }}</option>
                @endforeach
            </select>
            @error('ID_Anggota')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ID_Buku" class="form-label">Nama Buku</label>
            <select name="ID_Buku" id="ID_Buku" class="form-select @error('ID_Buku') is-invalid @enderror">
                <option value="">Pilih Buku</option>
                @foreach($buku as $buk)
                    <option value="{{ $buk->ID_Buku }}" {{ old('ID_Buku') == $buk->ID_Buku ? 'selected' : '' }}>{{ $buk->Nama_Buku }}</option>
                @endforeach
            </select>
            @error('ID_Buku')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Tanggal_Pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="Tanggal_Pinjam" id="Tanggal_Pinjam" class="form-control @error('Tanggal_Pinjam') is-invalid @enderror" value="{{ old('Tanggal_Pinjam') }}">
            @error('Tanggal_Pinjam')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Tanggal_Kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" name="Tanggal_Kembali" id="Tanggal_Kembali" class="form-control @error('Tanggal_Kembali') is-invalid @enderror" value="{{ old('Tanggal_Kembali') }}">
            @error('Tanggal_Kembali')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Denda" class="form-label">Denda</label>
            <input type="number" name="Denda" id="Denda" class="form-control @error('Denda') is-invalid @enderror" value="{{ old('Denda') }}">
            @error('Denda')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
