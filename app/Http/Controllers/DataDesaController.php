<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use App\Models\Pekerjaan;
use App\Models\JenisKelamin;
use App\Models\RentangUmur;
use App\Models\Pendidikan;
use App\Models\LembagaPendidikan;
use App\Models\Ekonomi;
use App\Models\Kesehatan;
use App\Models\HasilPertanian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataDesaController extends Controller
{
    public function index()
    {
        // Data Agama
        $dataAgamas     = Agama::all();
        $labels         = $dataAgamas->pluck('agama');
        $dataPenganut   = $dataAgamas->pluck('penganut');
        $total_penganut = $dataAgamas->sum('penganut');

        // Data Jenis Kelamin
        $dataJenisKelamins   = JenisKelamin::all();
        $labelsJenisKelamin  = $dataJenisKelamins->pluck('jenis_kelamin');
        $jumlah              = $dataJenisKelamins->pluck('jumlah');
        $jumlah_total        = $dataJenisKelamins->sum('jumlah');

        // Data Pekerjaan
        $dataPekerjaans    = Pekerjaan::all();
        $total_pekerjaan   = $dataPekerjaans->sum('jumlah');
        $labelsPekerjaan   = $dataPekerjaans->pluck('pekerjaan');
        $jumlahPekerjaan   = $dataPekerjaans->pluck('jumlah');

        // Data Rentang Umur
        $rentangUmurs      = RentangUmur::all();
        $totalRentangUmur  = $rentangUmurs->sum('jumlah');
        $labelRentangUmur  = $rentangUmurs->pluck('rentang_umur');
        $jumlahRentangUmur = $rentangUmurs->pluck('jumlah');
        
        // Data Pendidikan
        $pendidikans       = Pendidikan::all();
        $totalPendidikan   = $pendidikans->sum('jumlah');
        $labelPendidikan   = $pendidikans->pluck('pendidikan');
        $jumlahPendidikan  = $pendidikans->pluck('jumlah');

        // Data Lembaga Pendidikan
        $lembagaPendidikans      = LembagaPendidikan::all();
        $totalLembagaPendidikan  = $lembagaPendidikans->sum('jumlah');
        $labelLembagaPendidikan  = $lembagaPendidikans->pluck('lembaga');
        $jumlahLembagaPendidikan = $lembagaPendidikans->pluck('jumlah');

        // Data Ekonomi
        $ekonomis            = Ekonomi::all();
        $totalEkonomi        = $ekonomis->sum('jumlah');
        $labelEkonomi        = $ekonomis->pluck('ekonomi');
        $jumlahEkonomi       = $ekonomis->pluck('jumlah');

        // Data Kesehatan
        $kesehatans          = Kesehatan::all();
        $totalKesehatan      = $kesehatans->sum('jumlah');
        $labelKesehatan      = $kesehatans->pluck('kesehatan');
        $jumlahKesehatan     = $kesehatans->pluck('jumlah');

        // Data Pertanian
        $pertanians          = HasilPertanian::all();
        $labelPertanian      = $pertanians->pluck('jenis');
        $luasPertanian       = $pertanians->pluck('luas');
        $hasilPertanian      = $pertanians->pluck('hasil');


        return view('data-desa.index', [
            // Agama
            'dataAgamas'        => $dataAgamas,
            'labels'            => json_encode($labels),
            'dataPenganut'      => json_encode($dataPenganut),
            'totalPenganut'     => $total_penganut,

            // Jenis Kelamin
            'dataJenisKelamins' => $dataJenisKelamins,
            'labelsJenisKelamin'=> json_encode($labelsJenisKelamin),
            'jumlah'            => json_encode($jumlah),
            'jumlahTotal'       => $jumlah_total,

            // Pekerjaan
            'pekerjaans'        => $dataPekerjaans,
            'totalPekerjaan'    => $total_pekerjaan,
            'labelPekerjaan'    => json_encode($labelsPekerjaan),
            'jumlahPekerjaan'   => json_encode($jumlahPekerjaan),

            // Rentang Umur
            'rentang_umurs'     => $rentangUmurs,
            'totalRentangUmur'  => $totalRentangUmur,
            'labelRentangUmur'  => json_encode($labelRentangUmur),
            'jumlahRentangUmur' => json_encode($jumlahRentangUmur),

            // Pendidikan
            'pendidikans'       => $pendidikans,
            'totalPendidikan'   => $totalPendidikan,
            'labelPendidikan'   => json_encode($labelPendidikan),
            'jumlahPendidikan'  => json_encode($jumlahPendidikan),

            // Lembaga Pendidikan
            'lembagaPendidikans'        => $lembagaPendidikans,
            'totalLembagaPendidikan'    => $totalLembagaPendidikan,
            'labelLembagaPendidikan'    => json_encode($labelLembagaPendidikan),
            'jumlahLembagaPendidikan'   => json_encode($jumlahLembagaPendidikan),

            // Ekonomi
            'ekonomis'          => $ekonomis,
            'totalEkonomi'      => $totalEkonomi,
            'labelEkonomi'      => json_encode($labelEkonomi),
            'jumlahEkonomi'     => json_encode($jumlahEkonomi),

            // Kesehatan
            'kesehatans'        => $kesehatans,
            'totalKesehatan'    => $totalKesehatan,
            'labelKesehatan'    => json_encode($labelKesehatan),
            'jumlahKesehatan'   => json_encode($jumlahKesehatan),

            // Pertanian
            'pertanians'        => $pertanians,
            'labelPertanian'    => json_encode($labelPertanian),
            'luasPertanian'     => json_encode($luasPertanian),
            'hasilPertanian'    => json_encode($hasilPertanian),
        ]);
    }
}
