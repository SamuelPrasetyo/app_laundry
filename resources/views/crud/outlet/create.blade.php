@extends('layouts.app')

@section('title', 'Create Outlet')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>Tambah Data Outlet</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/outlet/action_create">Outlet
                {{ csrf_field() }}
                <div class="form-group mb-3">
                    <label for="Nama Outlet" class="form-label">Nama Outlet</label>
                    <input type="text" name="nama_outlet" class="form-control" placeholder="Input Outlet Name..." value="{{ old('nama_outlet') }}" autocomplete="off">

                        @if ($errors->has('nama_outlet'))
                            <div class="text-danger">
                                {{ $errors->first('nama_outlet') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                    <label for="Alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" cols="30" rows="10" placeholder="Input Address..." autocomplete="off">{{ old('alamat') }}</textarea>
                    
                        @if ($errors->has('alamat'))
                            <div class="text-danger">
                                {{ $errors->first('alamat') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                    <label for="Nomor Telepon" class="form-label">Nomor Telepon</label>
                    <input type="text" name="telepon" class="form-control" placeholder="Input Phone Number..." value="{{ old('telepon') }}" autocomplete="off">

                        @if ($errors->has('telepon'))
                            <div class="text-danger">
                                {{ $errors->first('telepon') }}
                            </div>
                        @endif
                </div>

                <div class="form-group" style="float: right;">
                    <button type="submit" class="btn btn-primary" style="width: 100px;">Submit</button>
                    <button type="reset" class="btn btn-light" style="width: 100px;">Reset</button>
                    <a href="/outlet" class="btn btn-dark" style="width: 100px;">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection