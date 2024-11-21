<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    public function index(): View {
        $penggunas = Pengguna::latest()->paginate(10);

        return view('pengguna.index', compact('penggunas'));
    }

    public function create(): View {
        return view('pengguna.create');
    }

    public function storeCreate(Request $request): RedirectResponse {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama'  => 'required',
            'email' => 'required|email|unique:penggunas,email',
            'no_hp' => 'required|numeric',
            'umur'  => 'required|numeric',
        ], [
            'image.required' => 'Foto profil harus diisi !!',
            'image.max' => 'Foto Maksimal 2MB',
            'image.mimes' => 'Foto harus dalam format JPEG, JPG atau PNG',
            'nama.required' => 'Nama harus diisi !!',
            'nama.max' => 'Nama terlalu panjang !!',
            'email.required' => 'Email harus diisi !!',
            'email.email' => 'Format email tidak valid !!',
            'no_hp.required' => 'Nomor telepon harus diisi !!',
            'no_hp.numeric' => 'Nomor telepon harus berupa angka !!',
            'umur.required' => 'Umur harus diisi !!',
            'umur.numeric' => 'Umur harus berupa angka !!',
            'jenis_kelamin.required' => 'Pilih jenis kelamin !!'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/penggunas', $image->hashName());

        Pengguna::create([
            'image'         => $image->hashName(),
            'nama'          => $request->nama,
            'email'         => $request->email,
            'no_hp'         => $request->no_hp,
            'umur'          => $request->umur,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

        return redirect()->route('pengguna.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View {
        $pengguna = Pengguna::findOrFail($id);

        return view('pengguna.show', compact('pengguna'));
    }

    public function edit(string $id): View {
        $pengguna = Pengguna::findOrFail($id);

        return view('pengguna.edit', compact('pengguna'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|numeric',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required',
        ], [
            'image.required' => 'Foto profil harus diisi !!',
            'image.max' => 'Foto Maksimal 2MB',
            'image.mimes' => 'Foto harus dalam format JPEG, JPG atau PNG',
            'nama.required' => 'Nama harus diisi !!',
            'nama.max' => 'Nama terlalu panjang !!',
            'email.required' => 'Email harus diisi !!',
            'email.email' => 'Format email tidak valid !!',
            'no_hp.required' => 'Nomor telepon harus diisi !!',
            'no_hp.numeric' => 'Nomor telepon harus berupa angka !!',
            'umur.required' => 'Umur harus diisi !!',
            'umur.numeric' => 'Umur harus berupa angka !!',
            'jenis_kelamin.required' => 'Pilih jenis kelamin !!'
        ]);
        

        $pengguna = Pengguna::findOrFail($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/penggunas', $image->hashName());

            Storage::delete('public/penggunas/'.$pengguna->image);

            $pengguna->update([
                'image'           => $image->hashName(),
                'nama'            => $request->nama,
                'email'           => $request->email,
                'no_hp'           => $request->no_hp,
                'umur'            => $request->umur,
                'jenis_kelamin'   => $request->jenis_kelamin,
            ]);

        } else {

            $pengguna->update([
                'nama'            => $request->nama,
                'email'           => $request->email,
                'no_hp'           => $request->no_hp,
                'umur'            => $request->umur,
                'jenis_kelamin'   => $request->jenis_kelamin,
            ]);
        }

        return redirect()->route('pengguna.index')->with(['success' => 'Data Pengguna Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse {
        $pengguna = Pengguna::findOrFail($id);
        Storage::delete('public/penggunas/' . $pengguna->image);
        $pengguna->delete();

        return redirect()->route('pengguna.index')->with(['success' => 'Data Pengguna Berhasil Dihapus!']);
    }


}
