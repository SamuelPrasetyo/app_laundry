@extends('layouts.app')

@section('title', 'Create Member')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>Tambah Data Member</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/member/action_create">
                {{ csrf_field() }}
                <div class="form-group mb-3">
                    <label for="Nama Member" class="form-label">Nama Member</label>
                    <input type="text" name="nama_member" class="form-control" placeholder="Input Member Name..." value="{{ old('nama_member') }}" autocomplete="off">

                        @if ($errors->has('nama_member'))
                            <div class="text-danger">
                                {{ $errors->first('nama_member') }}
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
                    <label for="Jenis Kelamin" class="form-label">Jenis Kelamin</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" id="Laki-Laki"
                            {{ old('jenis_kelamin') == 'L' ? 'checked' : ''}}>
                        <label for="Laki-Laki" class="form-check-label">Laki-Laki</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" value="P" id="Perempuan"
                        {{ old('jenis_kelamin') == 'P' ? 'checked' : ''}}>
                        <label for="Perempuan" class="form-check-label">Perempuan</label>
                    </div>
                    
                        @if ($errors->has('jenis_kelamin'))
                            <div class="text-danger">
                                {{ $errors->first('jenis_kelamin') }}
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
                    <a href="/member" class="btn btn-dark" style="width: 100px;">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection