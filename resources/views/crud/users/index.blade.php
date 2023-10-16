@extends('layouts.app')

@section('title', 'User Page')

@section('content')
<div class="container">
    <div class="card mt-2">
        <div class="card-header text-center">
            <h3>Data Pengguna Aplikasi Laundry</h3>
        </div>
        <div class="card-body">


<div class="container">
    <div class="row">
        <div class="col">
            <a href="/user/create" class="btn btn-primary mb-3">+ Data User</a>
            <a href="/user/trash" class="btn btn-light mb-3">Trash</a>
        </div>
        <div class="col">
            <div class="form-group">
                <form action="/user/search" method="get" class="form-inline">
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
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Action</th>
                </thead>
                <tbody class="text-center">
                    @foreach ($user as $index => $u)
                    <tr>
                        <td>{{ $index + $user->firstItem() }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->password }}</td>
                        <td>{{ $u->role }}</td>
                        <td width="200px">
                            <a href="/user/update/{{ $u->id }}" class="btn btn-warning" style="width: 75px;">Edit</a> |
                            <a href="/user/delete/{{ $u->id   }}" class="btn btn-danger" style="width: 75px;">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float: right;">
                <div style="text-align: right;">
                    Halaman : {{ $user->currentPage() }} <br>
                    Jumlah Data : {{ $user->total() }} <br>
                    Data per Halaman : {{ $user->perPage() }} <br>
                </div>
                {{ $user->links() }}
            </div>
        </div>
    </div>
</div>
@endsection