@extends('layouts.app')

@section('title', 'Update Paket Cucian')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>Update Data Paket Cucian</h3>
        </div>

        <div class="card-body">
            <form action="/paket/action_update/{{ $paket->id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group mb-3">
                    <label for="ID Outlet" class="form-label">ID Outlet</label>
                        <select name="id_outlet" class="form-select" style="width: 300px;">
                            <option selected value="">...</option>
                                @foreach ($db as $rw) 
								    <option value="{{ $rw->id; }}" {{ $rw->id == $paket->id_outlet ? 'selected' : ''}}>{{ $rw->nama_outlet; }}</option>
                                @endforeach
                        </select>

                        @if ($errors->has('id_outlet'))
                            <div class="text-danger">
                                {{ $errors->first('id_outlet') }}
                            </div>
                        @endif
                </div>

                <div class="form-group mb-3">
                    <label for="Jenis" class="form-label">Jenis</label>
                    <select name="jenis" class="form-select" style="width: 300px;">
                        <option selected value="">...</option>
                        <option value="Kiloan" {{ $paket->jenis == 'Kiloan' ? 'selected' : ''}}>Kiloan</option>
                        <option value="Selimut" {{ $paket->jenis == 'Selimut' ? 'selected' : ''}}>Selimut</option>
                        <option value="Bed Cover" {{ $paket->jenis == 'Bed Cover' ? 'selected' : ''}}>Bed Cover</option>
                        <option value="Kaos" {{ $paket->jenis == 'Kaos' ? 'selected' : ''}}>Kaos</option>
                        <option value="Lain-lain" {{ $paket->jenis == 'Lain-lain' ? 'selected' : ''}}>Lain-lain</option>
                    </select>

                        @if ($errors->has('jenis'))
                            <div class="text-danger">
                                {{ $errors->first('jenis') }}
                            </div>
                        @endif
                </div>

                <div class="form-group mb-3">
                    <label for="Nama Paket" class="form-label">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control" placeholder="Input Nama Paket..." value="{{ $paket->nama_paket }}" autocomplete="off">
                    
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
                        <input type="text" name="harga" class="form-control" placeholder="Input Harga..." value="{{ $paket->harga }}" autocomplete="off">
                    </div>
                            @if ($errors->has('harga'))
                                <div class="text-danger">
                                    {{ $errors->first('harga') }}
                                </div>
                            @endif
                </div>
                    
            <div class="form-group">
                <button type="submit" class="btn btn-warning" style="width: 100px;">Update</button>
                <a href="/paket" class="btn btn-light" style="width: 100px;">Back</a>
            </div>
            </form>
        </div>

    </div>
</div>
@endsection