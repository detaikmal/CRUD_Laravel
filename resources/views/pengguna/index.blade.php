<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">CRUD Laravel 11</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('pengguna.create') }}" class="btn btn-md btn-success mb-3">Tambah Pengguna</a>
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">FOTO PROFIL</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">NO HP</th>
                                <th scope="col">UMUR</th>
                                <th scope="col">JENIS KELAMIN</th>
                                <th scope="col" style="width: 20%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($penggunas as $pengguna)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('/storage/penggunas/'.$pengguna->image) }}" class="rounded-circle" style="width: 100px">
                                    </td>
                                    <td>{{ $pengguna->nama }}</td>
                                    <td>{{ $pengguna->email }}</td>
                                    <td>{{ $pengguna->no_hp }}</td>
                                    <td>{{ $pengguna->umur }}</td>
                                    <td>{{ $pengguna->jenis_kelamin }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pengguna.destroy', $pengguna->id) }}" method="POST">
                                            <a href="{{ route('pengguna.show', $pengguna->id) }}" class="btn btn-sm btn-dark">DETAIL</a>
                                            <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                        </table>
                        {{ $penggunas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

</body>
</html>
