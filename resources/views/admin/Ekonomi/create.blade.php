@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Tambah Data Sarana Ekonomi</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/admin/ekonomi" type="button" class="btn btn-warning float-end">Kembali</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <form method="POST" action="/admin/ekonomi">
                @csrf
                <div class="mb-3">
                    <label for="ekonomi" class="form-label">Jenis Sarana Ekonomi <span style="color: red">*</span></label>
                    <input type="text" class="form-control" name="ekonomi" id="ekonomi" value="{{ old('ekonomi') }}">
                    @error('ekonomi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah<span style="color: red">*</span></label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" value="{{ old('jumlah') }}">
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