<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {

            background-image: url('https://static.desty.app/desty-page/yhBrJ2Gog46IUAdcYE_x6.image/jpeg?x-oss-process=image/resize,w_800/format,webp'); /* Ganti dengan URL gambar */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;

  
        }
        .navbar {
            background-color: #ff0000;
        }
        .navbar-brand {
            color: white !important;
        }
        .navbar-nav .nav-link {
            color: white !important;
        }
        .navbar-nav .nav-link:hover {
            color: #ffcc00 !important;
        }
        .container {
            margin-top: 30px;
        }
        .card {
            margin-bottom: 20px;
        }
        footer {
            background-color: #ff0000;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">Perpustakaan</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('anggota.index') }}">Anggota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('buku.index') }}">Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('detailpinjam.index') }}">Peminjaman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('detailpinjam.create') }}">Tambah Peminjaman</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Footer -->
<footer>
    <p>&copy; 2024 Perpustakaan. Veraldo 2327250001.</p>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
