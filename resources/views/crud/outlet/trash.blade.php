@extends('layouts.app')

@section('title', 'Trash Data Outlet')

@section('content')
<div class="container">
    <div class="card mt-2">
        <div class="card-header text-center">
            <h3>Trash Data Outlet Laundry</h3>
        </div>
        <div class="card-body">


<div class="container">
    <div class="row">
        <div class="col">
            <a href="/outlet" class="btn btn-dark mb-3"><- Back</a>
            <a href="/outlet/restore_all" class="btn btn-success mb-3">Restore All</a>
            <!-- <a href="/outlet/delete_permanent_all" class="btn btn-danger mb-3">Delete All</a> -->
        </div>
        <div class="col">
            <div class="form-group">
                <form action="/outlet/search_trash" method="get" class="form-inline">
                    <input class="btn btn-success" type="submit" value="Find" style=" float: right; width: 80px;">
                    <input class="form-control" type="text" name="cari" placeholder="Search..." value="{{ old('cari') }}" style="width: 200px; float: right;" autocomplete="off" required>
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
                    @foreach ($outlet_trash as $index => $o)
                    <tr>
                        <td>{{ $index + $outlet_trash->firstItem() }}</td>
                        <td>{{ $o->nama_outlet }}</td>
                        <td>{{ $o->alamat }}</td>
                        <td>{{ $o->telepon }}</td>
                        <td width="150px">
                            <a href="/outlet/restore/{{ $o->id }}" class="btn btn-success" style="width: 125px;">Restore</a>
                            <!-- <a href="/outlet/delete_permanent/{{ $o->id }}" class="btn btn-danger" style="width: 150px;">Hapus Permanen</a> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float: right;">
                <div style="text-align: right;">
                    Halaman : {{ $outlet_trash->currentPage() }} <br>
                    Jumlah Data : {{ $outlet_trash->total() }} <br>
                    Data per Halaman : {{ $outlet_trash->perPage() }} <br>
                </div>
                {{ $outlet_trash->links() }}
            </div>
        </div>
    </div>
</div>
@endsection