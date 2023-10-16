@extends('layouts.app')

@section('title', 'Paket Cucian Page')

@section('content')
<div class="container">
    <div class="card mt-2">
        <div class="card-header text-center">
            <h3>Data Paket Cucian Laundry</h3>
        </div>
        <div class="card-body">


<div class="container">
    <div class="row">
        <div class="col">
            <a href="/paket/create" class="btn btn-primary mb-3">+ Data Paket</a>
            <a href="/paket/trash" class="btn btn-light mb-3">Trash</a>
        </div>
        <div class="col">
            <div class="form-group">
                <form action="/paket/search" method="get" class="form-inline">
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
                    <th>Jenis</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Action</th>
                </thead>
                <tbody class="text-center">
                    @foreach ($paket as $index => $p)
                    <tr>
                        <td>{{ $index + $paket->firstItem() }}</td>
                        <td>{{ $p->nama_outlet }}</td>
                        <td>{{ $p->jenis }}</td>
                        <td>{{ $p->nama_paket }}</td>
                        <td>{{ $p->harga }}</td>
                        <td width="200px">
                            <a href="/paket/update/{{ $p->id }}" class="btn btn-warning" style="width: 75px;">Edit</a> |
                            <a href="/paket/delete/{{ $p->id   }}" class="btn btn-danger" style="width: 75px;">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float: right;">
                <div style="text-align: right;">
                    Halaman : {{ $paket->currentPage() }} <br>
                    Jumlah Data : {{ $paket->total() }} <br>
                    Data per Halaman : {{ $paket->perPage() }} <br>
                </div>
                {{ $paket->links() }}
            </div>
        </div>
    </div>
</div>
@endsection