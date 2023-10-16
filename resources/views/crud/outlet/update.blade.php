@extends('layouts.app')

@section('title', 'Update Outlet')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>Update Data Outlet</h3>
        </div>

        <div class="card-body">
            <form action="/outlet/action_update/{{ $outlet->id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

            <div class="form-group mb-3">
                <label for="Nama Outlet" class="form-label">Nama Outlet</label>
                <input type="text" class="form-control" name="nama_outlet" placeholder="Input Outlet Name..." value="{{ $outlet->nama_outlet }}"  autocomplete="off">

                    @if ($errors->has('nama_outlet'))
                        <div class="text-danger">
                            {{ $errors->first('nama_outlet') }}
                        </div>
                    @endif
            </div>

            <div class="form-group mb-3">
                <label for="Alamat" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" cols="30" rows="10" placeholder="Input Address..." autocomplete="off">{{ $outlet->alamat }}</textarea>

                    @if ($errors->has('alamat'))
                        <div class="text-danger">
                            {{ $errors->first('alamat') }}
                        </div>
                    @endif
            </div>

            <div class="form-group mb-3">
                <label for="Nomor Telepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" name="telepon" placeholder="Input Phone Number..." value="{{ $outlet->telepon }}"  autocomplete="off">

                    @if ($errors->has('telepon'))
                        <div class="text-danger">
                            {{ $errors->first('telepon') }}
                        </div>
                    @endif
            </div>
                    
            <div class="form-group">
                <button type="submit" class="btn btn-warning" style="width: 100px;">Update</button>
                <a href="/outlet" class="btn btn-light" style="width: 100px;">Back</a>
            </div>
            </form>
        </div>

    </div>
</div>
@endsection