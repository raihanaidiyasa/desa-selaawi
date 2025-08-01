<?php

namespace App\Http\Controllers;

use App\Models\RentangUmur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminRentangUmurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.rentang-umur.index', [
            'rentang_umurs'    => RentangUmur::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rentang-umur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rentang_umur' => 'required',
            'jumlah'       => 'required|numeric'
        ], [
            'rentang_umur.required' => 'Form rentang umur tidak boleh kosong !',
            'jumlah.required'       => 'Form jumlah tidak boleh kosong !',
            'jumlah.numeric'        => 'Format yang diijinkan adalah angka !'
        ]);

        if($validator->fails()){
            return redirect('/admin/rentang-umur/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        RentangUmur::create([
            'rentang_umur' => $request->rentang_umur,
            'jumlah'       => $request->jumlah,
        ]);
        
        return redirect('/admin/rentang-umur')->with('success', 'Berhasil menambahkan data rentang umur');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rentang_umur = RentangUmur::find($id);
        return view('admin.rentang-umur.edit', [
            'rentang_umur'  => $rentang_umur
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rentang_umur = RentangUmur::find($id);
        $validator = Validator::make($request->all(), [
            'rentang_umur' => 'required',
            'jumlah'       => 'required|numeric'
        ], [
            'rentang_umur.required' => 'Form rentang umur tidak boleh kosong !',
            'jumlah.required'       => 'Form jumlah tidak boleh kosong !',
            'jumlah.numeric'        => 'Format yang diijinkan adalah angka !'
        ]);

        if($validator->fails()){
            return redirect('/admin/rentang-umur/' . $rentang_umur->id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $rentang_umur->update([
            'rentang_umur' => $request->rentang_umur,
            'jumlah'       => $request->jumlah,
        ]);

        return redirect('/admin/rentang-umur')->with('success', 'Berhasil mengedit data rentang umur !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rentang_umur = RentangUmur::find($id);
        $rentang_umur->delete();
        return redirect('/admin/rentang-umur')->with('success', 'Berhasil menghapus data rentang umur !');
    }
}