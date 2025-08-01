<?php

namespace App\Http\Controllers;

use App\Models\Ekonomi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminEkonomiController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan halaman utama data ekonomi.
     */
    public function index()
    {
        // Mengambil semua data dari model Ekonomi, diurutkan dari yang terbaru
        $ekonomis = Ekonomi::orderBy('id', 'DESC')->get();

        // Mengembalikan view dengan data ekonomi
        return view('admin.ekonomi.index', [
            'ekonomis' => $ekonomis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * Menampilkan form untuk menambah data ekonomi baru.
     */
    public function create()
    {
        return view('admin.ekonomi.create');
    }

    /**
     * Store a newly created resource in storage.
     * Menyimpan data ekonomi baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validator = Validator::make($request->all(), [
            'ekonomi' => 'required|string|max:255',
            'jumlah'  => 'required|integer',
        ], [
            'ekonomi.required' => 'Jenis sarana ekonomi wajib diisi!',
            'jumlah.required'  => 'Jumlah wajib diisi!',
            'jumlah.integer'   => 'Jumlah harus berupa angka!',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Membuat data baru di tabel ekonomis
        Ekonomi::create([
            'ekonomi' => $request->ekonomi,
            'jumlah'  => $request->jumlah,
        ]);

        // Mengalihkan ke halaman index dengan pesan sukses
        return redirect('/admin/ekonomi')->with('success', 'Berhasil menambahkan data ekonomi baru.');
    }

    /**
     * Show the form for editing the specified resource.
     * Menampilkan form untuk mengedit data ekonomi.
     */
    public function edit(string $id)
    {
        // Mencari data ekonomi berdasarkan ID
        $ekonomi = Ekonomi::find($id);

        // Mengembalikan view edit dengan data yang ditemukan
        return view('admin.ekonomi.edit', [
            'ekonomi' => $ekonomi
        ]);
    }

    /**
     * Update the specified resource in storage.
     * Memperbarui data ekonomi di dalam database.
     */
    public function update(Request $request, string $id)
    {
        // Mencari data ekonomi berdasarkan ID
        $ekonomi = Ekonomi::find($id);

        // Validasi input dari form
        $validator = Validator::make($request->all(), [
            'ekonomi' => 'required|string|max:255',
            'jumlah'  => 'required|integer',
        ], [
            'ekonomi.required' => 'Jenis sarana ekonomi wajib diisi!',
            'jumlah.required'  => 'Jumlah wajib diisi!',
            'jumlah.integer'   => 'Jumlah harus berupa angka!',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Memperbarui data
        $ekonomi->update([
            'ekonomi' => $request->ekonomi,
            'jumlah'  => $request->jumlah,
        ]);

        // Mengalihkan ke halaman index dengan pesan sukses
        return redirect('/admin/ekonomi')->with('success', 'Berhasil memperbarui data ekonomi.');
    }

    /**
     * Remove the specified resource from storage.
     * Menghapus data ekonomi dari database.
     */
    public function destroy(string $id)
    {
        // Mencari data ekonomi berdasarkan ID
        $ekonomi = Ekonomi::find($id);

        // Menghapus data
        $ekonomi->delete();

        // Mengalihkan kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Berhasil menghapus data ekonomi.');
    }
}