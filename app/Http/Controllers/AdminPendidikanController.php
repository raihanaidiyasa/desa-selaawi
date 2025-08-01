<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan halaman utama data pendidikan.
     */
    public function index()
    {
        // Mengambil semua data dari model Pendidikan, diurutkan dari yang terbaru
        $pendidikans = Pendidikan::orderBy('id', 'DESC')->get();

        // Mengembalikan view dengan data pendidikan
        return view('admin.pendidikan.index', [
            'pendidikans' => $pendidikans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * Menampilkan form untuk menambah data pendidikan baru.
     */
    public function create()
    {
        return view('admin.pendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     * Menyimpan data pendidikan baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validator = Validator::make($request->all(), [
            'nama_pendidikan' => 'required|string|max:255',
            'jumlah_siswa'    => 'required|integer',
        ], [
            'nama_pendidikan.required' => 'Nama pendidikan wajib diisi!',
            'jumlah_siswa.required'    => 'Jumlah siswa wajib diisi!',
            'jumlah_siswa.integer'     => 'Jumlah siswa harus berupa angka!',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Membuat data baru di tabel pendidikan
        Pendidikan::create([
            'nama_pendidikan' => $request->nama_pendidikan,
            'jumlah_siswa'    => $request->jumlah_siswa,
        ]);

        // Mengalihkan ke halaman index dengan pesan sukses
        return redirect('/admin/pendidikan')->with('success', 'Berhasil menambahkan data pendidikan baru.');
    }

    /**
     * Show the form for editing the specified resource.
     * Menampilkan form untuk mengedit data pendidikan.
     */
    public function edit(string $id)
    {
        // Mencari data pendidikan berdasarkan ID
        $pendidikan = Pendidikan::find($id);

        // Mengembalikan view edit dengan data yang ditemukan
        return view('admin.pendidikan.edit', [
            'pendidikan' => $pendidikan
        ]);
    }

    /**
     * Update the specified resource in storage.
     * Memperbarui data pendidikan di dalam database.
     */
    public function update(Request $request, string $id)
    {
        // Mencari data pendidikan berdasarkan ID
        $pendidikan = Pendidikan::find($id);

        // Validasi input dari form
        $validator = Validator::make($request->all(), [
            'nama_pendidikan' => 'required|string|max:255',
            'jumlah_siswa'    => 'required|integer',
        ], [
            'nama_pendidikan.required' => 'Nama pendidikan wajib diisi!',
            'jumlah_siswa.required'    => 'Jumlah siswa wajib diisi!',
            'jumlah_siswa.integer'     => 'Jumlah siswa harus berupa angka!',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Memperbarui data
        $pendidikan->update([
            'nama_pendidikan' => $request->nama_pendidikan,
            'jumlah_siswa'    => $request->jumlah_siswa,
        ]);

        // Mengalihkan ke halaman index dengan pesan sukses
        return redirect('/admin/pendidikan')->with('success', 'Berhasil memperbarui data pendidikan.');
    }

    /**
     * Remove the specified resource from storage.
     * Menghapus data pendidikan dari database.
     */
    public function destroy(string $id)
    {
        // Mencari data pendidikan berdasarkan ID
        $pendidikan = Pendidikan::find($id);

        // Menghapus data
        $pendidikan->delete();

        // Mengalihkan kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Berhasil menghapus data pendidikan.');
    }
}
