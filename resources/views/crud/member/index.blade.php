@extends('layouts.app')

@section('title', 'Member Page')

@section('content')
<div class="container">
    <div class="card mt-2">
        <div class="card-header text-center">
            <h3>Data Member</h3>
        </div>
        <div class="card-body">


<div class="container">
    <div class="row">
        <div class="col">
            <a href="/member/create" class="btn btn-primary mb-3">+ Data Member</a>
            <a href="/member/trash" class="btn btn-light mb-3">Trash</a>
        </div>
        <div class="col">
            <div class="form-group">
                <form action="/member/search" method="get" class="form-inline">
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
                    <th>Nama Member</th>
                    <th>Alamat</th>
                    <th>JK</th>
                    <th>Telepon</th>
                    <th>Action</th>
                </thead>
                <tbody class="text-center">
                    @foreach ($member as $index => $m)
                    <tr>
                        <td>{{ $index + $member->firstItem() }}</td>
                        <td>{{ $m->nama_member }}</td>
                        <td>{{ $m->alamat }}</td>
                        <td>{{ $m->jenis_kelamin }}</td>
                        <td>{{ $m->telepon }}</td>
                        <td width="200px">
                            <a href="/member/update/{{ $m->id }}" class="btn btn-warning" style="width: 75px;">Edit</a> |
                            <a href="/member/delete/{{ $m->id   }}" class="btn btn-danger" style="width: 75px;">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float: right;">
                <div style="text-align: right;">
                    Halaman : {{ $member->currentPage() }} <br>
                    Jumlah Data : {{ $member->total() }} <br>
                    Data per Halaman : {{ $member->perPage() }} <br>
                </div>
                {{ $member->links() }}
            </div>
        </div>
    </div>
</div>
@endsection