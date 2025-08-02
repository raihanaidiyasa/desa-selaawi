@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Data Sarana Ekonomi</h5>
                </div>
                <div class="col-6 text-right">
                    <a href="/admin/ekonomi/create" type="button" class="btn btn-warning float-end">Tambah Data</a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table id="table_id" class="table display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Sarana Ekonomi</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Loop data dari variabel $ekonomis --}}
                        @foreach ($ekonomis as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- Menampilkan kolom 'ekonomi' dan 'jumlah' --}}
                                <td>{{ $item->ekonomi }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>
                                    {{-- Tombol Edit --}}
                                    <a href="/admin/ekonomi/{{ $item->id }}/edit" type="button" class="btn btn-warning mb-1"><i class="ti ti-edit"></i></a>
                                    
                                    {{-- Tombol Hapus --}}
                                    <form id="delete-form-{{ $item->id }}" action="/admin/ekonomi/{{ $item->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="button" class="btn btn-danger swal-confirm mb-1" data-form="delete-form-{{ $item->id }}"><i class="ti ti-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    });
</script>

@endsection