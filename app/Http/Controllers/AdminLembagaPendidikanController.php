<?php

namespace App\Http\Controllers;

use App\Models\LembagaPendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminLembagaPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan halaman utama data lembaga pendidikan.
     */
    public function index()
    {
        // Mengambil semua data dari model LembagaPendidikan, diurutkan dari yang terbaru
        $lembagaPendidikans = LembagaPendidikan::orderBy('id', 'DESC')->get();

        // Mengembalikan view dengan data lembaga pendidikan
        return view('admin.lembaga_pendidikan.index', [
            'lembagaPendidikans' => $lembagaPendidikans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * Menampilkan form untuk menambah data lembaga pendidikan baru.
     */
    public function create()
    {
        return view('admin.lembaga_pendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     * Menyimpan data lembaga pendidikan baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validator = Validator::make($request->all(), [
            'lembaga' => 'required|string|max:255',
            'jumlah'  => 'required|integer',
        ], [
            'lembaga.required' => 'Nama lembaga wajib diisi!',
            'jumlah.required'  => 'Jumlah wajib diisi!',
            'jumlah.integer'   => 'Jumlah harus berupa angka!',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Membuat data baru di tabel lembagapendidikans
        LembagaPendidikan::create([
            'lembaga' => $request->lembaga,
            'jumlah'  => $request->jumlah,
        ]);

        // Mengalihkan ke halaman index dengan pesan sukses
        return redirect('/admin/lembaga-pendidikan')->with('success', 'Berhasil menambahkan data lembaga pendidikan baru.');
    }

    /**
     * Show the form for editing the specified resource.
     * Menampilkan form untuk mengedit data lembaga pendidikan.
     */
    public function edit(string $id)
    {
        // Mencari data lembaga pendidikan berdasarkan ID
        $lembagaPendidikan = LembagaPendidikan::find($id);

        // Mengembalikan view edit dengan data yang ditemukan
        return view('admin.lembaga_pendidikan.edit', [
            'lembagaPendidikan' => $lembagaPendidikan
        ]);
    }

    /**
     * Update the specified resource in storage.
     * Memperbarui data lembaga pendidikan di dalam database.
     */
    public function update(Request $request, string $id)
    {
        // Mencari data lembaga pendidikan berdasarkan ID
        $lembagaPendidikan = LembagaPendidikan::find($id);

        // Validasi input dari form
        $validator = Validator::make($request->all(), [
            'lembaga' => 'required|string|max:255',
            'jumlah'  => 'required|integer',
        ], [
            'lembaga.required' => 'Nama lembaga wajib diisi!',
            'jumlah.required'  => 'Jumlah wajib diisi!',
            'jumlah.integer'   => 'Jumlah harus berupa angka!',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Memperbarui data
        $lembagaPendidikan->update([
            'lembaga' => $request->lembaga,
            'jumlah'  => $request->jumlah,
        ]);

        // Mengalihkan ke halaman index dengan pesan sukses
        return redirect('/admin/lembaga-pendidikan')->with('success', 'Berhasil memperbarui data lembaga pendidikan.');
    }

    /**
     * Remove the specified resource from storage.
     * Menghapus data lembaga pendidikan dari database.
     */
    public function destroy(string $id)
    {
        // Mencari data lembaga pendidikan berdasarkan ID
        $lembagaPendidikan = LembagaPendidikan::find($id);

        // Menghapus data
        $lembagaPendidikan->delete();

        // Mengalihkan kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Berhasil menghapus data lembaga pendidikan.');
    }
}
