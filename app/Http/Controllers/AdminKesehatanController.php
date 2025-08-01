<?php

namespace App\Http\Controllers;

use App\Models\Kesehatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminKesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan halaman utama data kesehatan.
     */
    public function index()
    {
        // Mengambil semua data dari model Kesehatan, diurutkan dari yang terbaru
        $kesehatans = Kesehatan::orderBy('id', 'DESC')->get();

        // Mengembalikan view dengan data kesehatan
        return view('admin.kesehatan.index', [
            'kesehatans' => $kesehatans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * Menampilkan form untuk menambah data kesehatan baru.
     */
    public function create()
    {
        return view('admin.kesehatan.create');
    }

    /**
     * Store a newly created resource in storage.
     * Menyimpan data kesehatan baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validator = Validator::make($request->all(), [
            'kesehatan' => 'required|string|max:255',
            'jumlah'    => 'required|integer',
        ], [
            'kesehatan.required' => 'Jenis faskes/tenaga kesehatan wajib diisi!',
            'jumlah.required'    => 'Jumlah wajib diisi!',
            'jumlah.integer'     => 'Jumlah harus berupa angka!',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Membuat data baru di tabel kesehatan
        Kesehatan::create([
            'kesehatan' => $request->kesehatan,
            'jumlah'    => $request->jumlah,
        ]);

        // Mengalihkan ke halaman index dengan pesan sukses
        return redirect('/admin/kesehatan')->with('success', 'Berhasil menambahkan data kesehatan baru.');
    }

    /**
     * Show the form for editing the specified resource.
     * Menampilkan form untuk mengedit data kesehatan.
     */
    public function edit(string $id)
    {
        // Mencari data kesehatan berdasarkan ID
        $kesehatan = Kesehatan::find($id);

        // Mengembalikan view edit dengan data yang ditemukan
        return view('admin.kesehatan.edit', [
            'kesehatan' => $kesehatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     * Memperbarui data kesehatan di dalam database.
     */
    public function update(Request $request, string $id)
    {
        // Mencari data kesehatan berdasarkan ID
        $kesehatan = Kesehatan::find($id);

        // Validasi input dari form
        $validator = Validator::make($request->all(), [
            'kesehatan' => 'required|string|max:255',
            'jumlah'    => 'required|integer',
        ], [
            'kesehatan.required' => 'Jenis faskes/tenaga kesehatan wajib diisi!',
            'jumlah.required'    => 'Jumlah wajib diisi!',
            'jumlah.integer'     => 'Jumlah harus berupa angka!',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Memperbarui data
        $kesehatan->update([
            'kesehatan' => $request->kesehatan,
            'jumlah'    => $request->jumlah,
        ]);

        // Mengalihkan ke halaman index dengan pesan sukses
        return redirect('/admin/kesehatan')->with('success', 'Berhasil memperbarui data kesehatan.');
    }

    /**
     * Remove the specified resource from storage.
     * Menghapus data kesehatan dari database.
     */
    public function destroy(string $id)
    {
        // Mencari data kesehatan berdasarkan ID
        $kesehatan = Kesehatan::find($id);

        // Menghapus data
        $kesehatan->delete();

        // Mengalihkan kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Berhasil menghapus data kesehatan.');
    }
}