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
    <div class="row mb-2">
        <div class="col">
            <a href="/member" class="btn btn-dark" style="float: right;"><- Back</a>
        </div>
    </div>
</div>


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
                    Jumlah Data : {{ $member->total() }} <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection