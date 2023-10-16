@extends('layouts.app')

@section('title', 'Outlet Page')

@section('content')
<div class="container">
    <div class="card mt-2">
        <div class="card-header text-center">
            <h3>Data Outlet Laundry</h3>
        </div>
        <div class="card-body">


<div class="container">
    <div class="row">
        <div class="col">
            <a href="/outlet/create" class="btn btn-primary mb-3">+ Data Outlet</a>
            <a href="/outlet/trash" class="btn btn-light mb-3">Trash</a>
        </div>
        <div class="col">
            <div class="form-group">
                <form action="/outlet/search" method="get" class="form-inline">
                    <input class="btn btn-success" type="submit" value="Find" style=" float: right; width: 80px;">
                    <input class="form-control" type="text" name="cari" placeholder="Search..." style="width: 200px; float: right;" autocomplete="off" required>
                </form>
            </div>
        </div>
    </div>
</div>
                @if ($message = Session::get('Sukses'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> 
                    </div>
                @endif

            <table class="table table-bordered table-striped">
                <thead class="text-center">
                    <th>No.</th>
                    <th>Nama Outlet</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Action</th>
                </thead>
                <tbody class="text-center">
                    @foreach ($outlet as $index => $o)
                    <tr>
                        <td>{{ $index + $outlet->firstItem() }}</td>
                        <td>{{ $o->nama_outlet }}</td>
                        <td>{{ $o->alamat }}</td>
                        <td>{{ $o->telepon }}</td>
                        <td width="200px">
                            <a href="/outlet/update/{{ $o->id }}" class="btn btn-warning" style="width: 75px;">Edit</a> |
                            <a href="/outlet/delete/{{ $o->id   }}" class="btn btn-danger" style="width: 75px;">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float: right;">
                <div style="text-align: right;">
                    Halaman : {{ $outlet->currentPage() }} <br>
                    Jumlah Data : {{ $outlet->total() }} <br>
                    Data per Halaman : {{ $outlet->perPage() }} <br>
                </div>
                {{ $outlet->links() }}
            </div>
        </div>
    </div>
</div>
@endsection