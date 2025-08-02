<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminPendidikanController extends Controller
{
    public function index()
    {
        $pendidikans = Pendidikan::orderBy('id', 'DESC')->get();

        return view('admin.pendidikan.index', [
            'pendidikans' => $pendidikans
        ]);
    }

    public function create()
    {
        return view('admin.pendidikan.create');
    }
    public function store(Request $request)
    {
        // Validasi input dari form
        $validator = Validator::make($request->all(), [
            'pendidikan' => 'required|string|max:255',
            'jumlah'    => 'required|integer',
        ], [
            'pendidikan.required' => 'Nama pendidikan wajib diisi!',
            'jumlah.required'    => 'Jumlah siswa wajib diisi!',
            'jumlah.integer'     => 'Jumlah siswa harus berupa angka!',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Pendidikan::create([
            'pendidikan' => $request->pendidikan,
            'jumlah'    => $request->siswa,
        ]);

        return redirect('/admin/pendidikan')->with('success', 'Berhasil menambahkan data pendidikan baru.');
    }

    public function edit(string $id)
    {

        $pendidikan = Pendidikan::find($id);
        return view('admin.pendidikan.edit', [
            'pendidikan' => $pendidikan
        ]);
    }
    public function update(Request $request, string $id)
    {
        $pendidikan = Pendidikan::find($id);
        $validator = Validator::make($request->all(), [
            'pendidikan' => 'required|string|max:255',
            'jumlah'    => 'required|integer',
        ], [
            'pendidikan.required' => 'Nama pendidikan wajib diisi!',
            'jumlah.required'    => 'Jumlah siswa wajib diisi!',
            'jumlah.integer'     => 'Jumlah siswa harus berupa angka!',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $pendidikan->update([
            'pendidikan' => $request->pendidikan,
            'jumlah'    => $request->jumlah,
        ]);
        return redirect('/admin/pendidikan')->with('success', 'Berhasil memperbarui data pendidikan.');
    }

    public function destroy(string $id)
    {
        $pendidikan = Pendidikan::find($id);
        $pendidikan->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data pendidikan.');
    }
}
