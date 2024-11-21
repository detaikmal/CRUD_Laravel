<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container text-center mt-5">
        <h1 class="mb-4">Selamat Datang di Aplikasi CRUD Pengguna</h1>
        <p>Kelola data pengguna dengan mudah dan efisien.</p>
        <a href="{{ route('pengguna.index') }}" class="btn btn-primary mt-3">Masuk ke Halaman Pengguna</a>
    </div>
</body>
</html>
