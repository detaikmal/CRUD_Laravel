<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <!-- Menampilkan Gambar Profil Pengguna -->
                        <img src="{{ asset('storage/penggunas/'.$pengguna->image) }}" class="rounded-circle" style="width: 100%">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $pengguna->nama }}</h3>
                        <hr/>
                        <p><strong>Email:</strong> {{ $pengguna->email }}</p>
                        <hr/>
                        <p><strong>No HP:</strong> {{ $pengguna->no_hp }}</p>
                        <p><strong>Umur:</strong> {{ $pengguna->umur }} Tahun</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $pengguna->jenis_kelamin }}</p>
                    </div>
                </div>
                <!-- Tombol Kembali -->
                <a href="{{ route('pengguna.index') }}" class="btn btn-primary mt-3">
                    Kembali ke Halaman Data Pengguna
                </a>
            </div>
        </div>
    </div>
</body>
</html>
