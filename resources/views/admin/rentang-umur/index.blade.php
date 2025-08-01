@extends('admin.layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-header bg-primary">
            <div class="row align-items-center">
                <div class="col-6">
                    <h5 class="card-title fw-semibold text-white">Data Rentang Umur</h5>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="table-responsive">
                    <table id="table_id" class="table display">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Rentang Umur</th>
                                <th>Jumlah</th>
                                <th>Perbarui Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rentang_umurs as $rentang_umur)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $rentang_umur->rentang_umur }}</td>
                                    <td>{{ $rentang_umur->jumlah }}</td>
                                    <td>
                                        <a href="/admin/rentang-umur/{{ $rentang_umur->id }}/edit" type="button" class="btn btn-warning mb-1"><i class="ti ti-edit"></i></a>
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
</div>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    });
</script>

@endsection