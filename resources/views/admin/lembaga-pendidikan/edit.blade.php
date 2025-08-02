@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Edit Data Lembaga Pendidikan</h5>
                </div>
                <div class="col-6 text-right">
                    {{-- Mengarahkan kembali ke halaman index lembaga pendidikan --}}
                    <a href="/admin/lembaga-pendidikan" type="button" class="btn btn-warning float-end">Kembali</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            {{-- Form action disesuaikan untuk route update lembaga pendidikan --}}
            <form method="POST" action="/admin/lembaga-pendidikan/{{ $lembagaPendidikan->id }}">
                @method('put')
                @csrf
                <div class="mb-3">
                    {{-- Input untuk 'lembaga' --}}
                    <label for="lembaga" class="form-label">Nama Lembaga <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="lembaga" id="lembaga" value="{{ old('lembaga', $lembagaPendidikan->lembaga) }}">
                    @error('lembaga')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    {{-- Input untuk 'jumlah' --}}
                    <label for="jumlah" class="form-label">Jumlah<span style="color: red">*</span></label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{ old('jumlah', $lembagaPendidikan->jumlah) }}">
                    @error('jumlah')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary m-1 float-end">Simpan</button>
            </form>
        </div>
      </div>
    </div>
</div>

@endsection