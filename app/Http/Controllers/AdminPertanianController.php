<?php

namespace App\Http\Controllers;

use App\Models\HasilPertanian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminPertanianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.hasil-pertanian.index', [
            'pertanians'    => HasilPertanian::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hasil-pertanian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => 'required',
            'luas'  => 'required|numeric',
            'hasil' => 'required|numeric'
        ], [
            'jenis.required' => 'Form jenis tanaman tidak boleh kosong !',
            'luas.required'  => 'Form luas tidak boleh kosong !',
            'luas.numeric'   => 'Format luas yang diijinkan adalah angka !',
            'hasil.required' => 'Form hasil tidak boleh kosong !',
            'hasil.numeric'  => 'Format hasil yang diijinkan adalah angka !'
        ]);

        if($validator->fails()){
            return redirect('/admin/hasil-pertanian/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        HasilPertanian::create([
            'jenis' => $request->jenis,
            'luas'  => $request->luas,
            'hasil' => $request->hasil,
        ]);
        
        return redirect('/admin/hasil-pertanian')->with('success', 'Berhasil menambahkan data pertanian');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pertanian = HasilPertanian::find($id);
        return view('admin.hasil-pertanian.edit', [
            'pertanian'  => $pertanian
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pertanian = HasilPertanian::find($id);
        $validator = Validator::make($request->all(), [
            'jenis' => 'required',
            'luas'  => 'required|numeric',
            'hasil' => 'required|numeric'
        ], [
            'jenis.required' => 'Form jenis tanaman tidak boleh kosong !',
            'luas.required'  => 'Form luas tidak boleh kosong !',
            'luas.numeric'   => 'Format luas yang diijinkan adalah angka !',
            'hasil.required' => 'Form hasil tidak boleh kosong !',
            'hasil.numeric'  => 'Format hasil yang diijinkan adalah angka !'
        ]);

        if($validator->fails()){
            return redirect('/admin/hasil-pertanian/' . $pertanian->id . '/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        $pertanian->update([
            'jenis' => $request->jenis,
            'luas'  => $request->luas,
            'hasil' => $request->hasil,
        ]);

        return redirect('/admin/hasil-pertanian')->with('success', 'Berhasil mengedit data pertanian !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pertanian = HasilPertanian::find($id);
        $pertanian->delete();
        return redirect('/admin/hasil-pertanian')->with('success', 'Berhasil menghapus data pertanian !');
    }
}