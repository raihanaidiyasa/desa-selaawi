<?php

namespace App\Http\Controllers;

use App\Models\LembagaPendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminLembagaPendidikanController extends Controller
{
    public function index()
    {
        $lembagaPendidikans = LembagaPendidikan::orderBy('id', 'DESC')->get();
        return view('admin.lembaga-pendidikan.index', [
            'lembagaPendidikans' => $lembagaPendidikans
        ]);
    }
    public function create()
    {
        return view('admin.lembaga-pendidikan.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lembaga' => 'required|string|max:255',
            'jumlah'  => 'required|integer',
        ], [
            'lembaga.required' => 'Nama lembaga wajib diisi!',
            'jumlah.required'  => 'Jumlah wajib diisi!',
            'jumlah.integer'   => 'Jumlah harus berupa angka!',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        LembagaPendidikan::create([
            'lembaga' => $request->lembaga,
            'jumlah'  => $request->jumlah,
        ]);

        return redirect('/admin/lembaga-pendidikan')->with('success', 'Berhasil menambahkan data lembaga pendidikan baru.');
    }
    public function edit(string $id)
    {
        $lembagaPendidikan = LembagaPendidikan::find($id);
        return view('admin.lembaga-pendidikan.edit', [
            'lembagaPendidikan' => $lembagaPendidikan
        ]);
    }
    public function update(Request $request, string $id)
    {
        $lembagaPendidikan = LembagaPendidikan::find($id);
        $validator = Validator::make($request->all(), [
            'lembaga' => 'required|string|max:255',
            'jumlah'  => 'required|integer',
        ], [
            'lembaga.required' => 'Nama lembaga wajib diisi!',
            'jumlah.required'  => 'Jumlah wajib diisi!',
            'jumlah.integer'   => 'Jumlah harus berupa angka!',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $lembagaPendidikan->update([
            'lembaga' => $request->lembaga,
            'jumlah'  => $request->jumlah,
        ]);

        return redirect('/admin/lembaga-pendidikan')->with('success', 'Berhasil memperbarui data lembaga pendidikan.');
    }

    public function destroy(string $id)
    {
        $lembagaPendidikan = LembagaPendidikan::find($id);
        $lembagaPendidikan->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data lembaga pendidikan.');
    }
}
