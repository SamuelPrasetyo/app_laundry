@extends('layouts.app')

@section('title', 'Transaksi Page')

@section('content')
<div class="container">
    <div class="card mt-2">
        <div class="card-header text-center">
            <h3>Data Transaksi</h3>
        </div>
        <div class="card-body">


<div class="container">
    <div class="row">
        <div class="col">
            <a href="/transaksi/create" class="btn btn-primary mb-3">+ Transaksi</a>
            <a href="/transaksi/trash" class="btn btn-light mb-3">Trash</a>
        </div>
        <div class="col">
            <div class="form-group">
                <form action="/transaksi/search" method="get" class="form-inline">
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
                    <th>Outlet</th>
                    <th>Kode Invoice</th>
                    <th>Tanggal</th>
                    <th>Batas Waktu</th>
                    <th>Status</th>
                    <th>Dibayar</th>
                    <th>Action</th>
                </thead>
                <tbody class="text-center">
                    @foreach ($transaksi as $index => $t)
                    <tr>
                        <td>{{ $index + $transaksi->firstItem() }}</td>
                        <td>{{ $t->nama_outlet }}</td>
                        <td>{{ $t->kode_invoice }}</td>
                        <td>{{ $t->tanggal }}</td>
                        <td>{{ $t->batas_waktu }}</td>
                        <td width="200px">
                            <a href="/transaksi/detail/{{ $t->id }}" class="btn btn-primary" style="width: 75px;">Detail</a>
                            <a href="/transaksi/update/{{ $t->id }}" class="btn btn-warning" style="width: 75px;">Edit</a> |
                            <a href="/transaksi/delete/{{ $t->id   }}" class="btn btn-danger" style="width: 75px;">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float: right;">
                <div style="text-align: right;">
                    Halaman : {{ $transaksi->currentPage() }} <br>
                    Jumlah Data : {{ $transaksi->total() }} <br>
                    Data per Halaman : {{ $transaksi->perPage() }} <br>
                </div>
                {{ $transaksi->links() }}
            </div>
        </div>
    </div>
</div>
@endsection