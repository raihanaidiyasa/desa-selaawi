@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Edit Data Hasil Pertanian</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/admin/hasil-pertanian" type="button" class="btn btn-warning float-end">Kembali</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <form method="POST" action="/admin/hasil-pertanian/{{ $pertanian->id }}">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="jenis" class="form-label">Jenis Tanaman <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="jenis" id="jenis" value="{{ old('jenis', $pertanian->jenis) }}">
                    @error('jenis')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="luas" class="form-label">Luas (Ha)<span style="color: red">*</span></label>
                    <input type="number" step="any" class="form-control" name="luas" id="luas" value="{{ old('luas', $pertanian->luas) }}">
                    @error('luas')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="hasil" class="form-label">Hasil (Ton)<span style="color: red">*</span></label>
                    <input type="number" step="any" class="form-control" name="hasil" id="hasil" value="{{ old('hasil', $pertanian->hasil) }}">
                    @error('hasil')
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