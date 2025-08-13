<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use Illuminate\Http\Request;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $perangkatDesas = PerangkatDesa::orderBy('id', 'DESC')->get();

        return view('perangkat-desa.index', [
            'perangkatDesas' => $perangkatDesas
        ]);
    }
}
