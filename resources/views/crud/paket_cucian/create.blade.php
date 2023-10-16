@extends('layouts.app')

@section('title', 'Create Paket Cucian')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>Tambah Data Paket Cucian</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/paket/action_create">
                {{ csrf_field() }}
                <div class="form-group mb-3">
                    <label for="ID Outlet" class="form-label">Outlet</label>
                            <select name="id_outlet" class="form-select" style="width: 300px;">
                                <option selected value="">...</option>
									@foreach ($db as $rw) 
									    <option value="{{ $rw->id; }}" 
                                            {{ old('id_outlet') == $rw->id ? 'selected' : '' }}>
                                            {{ $rw->nama_outlet; }}</option>
                                    @endforeach
                            </select>

                        @if ($errors->has('id_outlet'))
                            <div class="text-danger">
                                {{ $errors->first('id_outlet') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                    <label for="Jenis" class="form-label">Jenis Paket</label>
                    <select name="jenis" class="form-select" style="width: 300px;">
                        <option selected value="">...</option>
                        <option value="Kiloan" {{ old('jenis') == 'Kiloan' ? 'selected' : '' }}>Kiloan</option>
                        <option value="Selimut" {{ old('jenis') == 'Selimut' ? 'selected' : '' }}>Selimut</option>
                        <option value="Bed Cover" {{ old('jenis') == 'Bed Cover' ? 'selected' : '' }}>Bed Cover</option>
                        <option value="Kaos" {{ old('jenis') == 'Kaos' ? 'selected' : '' }}>Kaos</option>
                        <option value="Lain-lain" {{ old('jenis') == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                    </select>            

                        @if ($errors->has('jenis'))
                            <div class="text-danger">
                                {{ $errors->first('jenis') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                    <label for="Nama Paket" class="form-label">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control" placeholder="Input Package Name..." value="{{ old('nama_paket') }}" autocomplete="off">
                    
                        @if ($errors->has('nama_paket'))
                            <div class="text-danger">
                                {{ $errors->first('nama_paket') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                        <label for="Harga" class="form-label">Harga</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" name="harga" class="form-control" placeholder="Input Price..." value="{{ old('harga') }}" autocomplete="off">
                    </div>
                            @if ($errors->has('harga'))
                                <div class="text-danger">
                                    {{ $errors->first('harga') }}
                                </div>
                            @endif
                </div>

                <div class="form-group" style="float: right;">
                    <button type="submit" class="btn btn-primary" style="width: 100px;">Submit</button>
                    <button type="reset" class="btn btn-light" style="width: 100px;">Reset</button>
                    <a href="/paket" class="btn btn-dark" style="width: 100px;">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection