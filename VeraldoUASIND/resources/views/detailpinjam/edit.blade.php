<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Detail Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Edit Detail Peminjaman</h2>

    <!-- Form untuk Edit -->
    <form action="{{ route('detailpinjam.update', $detailPinjam->No_Pinjam) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menggunakan PUT untuk update -->

        <!-- Input untuk ID Anggota -->
        <div class="mb-3">
            <label for="ID_Anggota" class="form-label">ID Anggota</label>
            <select name="ID_Anggota" id="ID_Anggota" class="form-select @error('ID_Anggota') is-invalid @enderror">
                <option value="">Pilih ID Anggota</option>
                @foreach($anggota as $anggota)
                    <option value="{{ $anggota->ID_Anggota }}" {{ old('ID_Anggota', $detailPinjam->ID_Anggota) == $anggota->ID_Anggota ? 'selected' : '' }}>{{ $anggota->ID_Anggota }}</option>
                @endforeach
            </select>
            @error('ID_Anggota')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <!-- Input untuk ID Buku -->
        <div class="mb-3">
            <label for="ID_Buku" class="form-label">ID Buku</label>
            <select name="ID_Buku" id="ID_Buku" class="form-select @error('ID_Buku') is-invalid @enderror">
                <option value="">Pilih ID Buku</option>
                @foreach($buku as $buku)
                    <option value="{{ $buku->ID_Buku }}" {{ old('ID_Buku', $detailPinjam->ID_Buku) == $buku->ID_Buku ? 'selected' : '' }}>{{ $buku->ID_Buku }}</option>
                @endforeach
            </select>
            @error('ID_Buku')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <!-- Input untuk Tanggal Pinjam -->
        <div class="mb-3">
            <label for="Tgl_Pinjam" class="form-label">Tanggal Pinjam</label>
            <input type="date" name="Tgl_Pinjam" id="Tgl_Pinjam" value="{{ old('Tgl_Pinjam', $detailPinjam->Tgl_Pinjam) }}" class="form-control @error('Tgl_Pinjam') is-invalid @enderror">
            @error('Tgl_Pinjam')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <!-- Input untuk Tanggal Kembali -->
        <div class="mb-3">
            <label for="Tgl_Kembali" class="form-label">Tanggal Kembali</label>
            <input type="date" name="Tgl_Kembali" id="Tgl_Kembali" value="{{ old('Tgl_Kembali', $detailPinjam->Tgl_Kembali) }}" class="form-control @error('Tgl_Kembali') is-invalid @enderror">
            @error('Tgl_Kembali')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Input untuk Denda -->
        <div class="mb-3">
            <label for="Denda" class="form-label">Denda</label>
            <input type="number" name="Denda" id="Denda" value="{{ old('Denda', $detailPinjam->Denda) }}" class="form-control @error('Denda') is-invalid @enderror">
            @error('Denda')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
        <!-- Tombol Submit untuk menyimpan perubahan -->
        <button type="submit" class="btn btn-primary">Simpan</button>

        <!-- Tombol Kembali untuk kembali ke halaman utama -->
        <a href="{{ route('detailpinjam.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
