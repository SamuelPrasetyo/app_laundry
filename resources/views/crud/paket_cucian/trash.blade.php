@extends('layouts.app')

@section('title', 'Trash Data Paket Cucian')

@section('content')
<div class="container">
    <div class="card mt-2">
        <div class="card-header text-center">
            <h3>Trash Data Paket Cucian</h3>
        </div>
        <div class="card-body">


<div class="container">
    <div class="row">
        <div class="col">
            <a href="/paket" class="btn btn-dark mb-3"><- Back</a>
            <a href="/paket/restore_all" class="btn btn-success mb-3">Restore All</a>
            <!-- <a href="/paket/delete_permanent_all" class="btn btn-danger mb-3">Delete All</a> -->
        </div>
        <div class="col">
            <div class="form-group">
                <form action="/paket/search_trash" method="get" class="form-inline">
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
                    <th>ID Outlet</th>
                    <th>Jenis</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Action</th>
                </thead>
                <tbody class="text-center">
                    @foreach ($paket_trash as $index => $p)
                    <tr>
                    <td>{{ $index + $paket_trash->firstItem() }}</td>
                        <td>{{ $p->id_outlet }}</td>
                        <td>{{ $p->jenis }}</td>
                        <td>{{ $p->nama_paket }}</td>
                        <td>{{ $p->harga }}</td>
                        <td width="150px">
                            <a href="/paket/restore/{{ $p->id }}" class="btn btn-success" style="width: 125px;">Restore</a>
                            <!-- <a href="/paket/delete_permanent/{{ $p->id }}" class="btn btn-danger" style="width: 150px;">Hapus Permanen</a> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float: right;">
                <div style="text-align: right;">
                    Halaman : {{ $paket_trash->currentPage() }} <br>
                    Jumlah Data : {{ $paket_trash->total() }} <br>
                    Data per Halaman : {{ $paket_trash->perPage() }} <br>
                </div>
                {{ $paket_trash->links() }}
            </div>
        </div>
    </div>
</div>
@endsection