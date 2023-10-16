@extends('layouts.app')

@section('title', 'Entri Transaksi')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>Entri Transaksi</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/transaksi/action_create">
                {{ csrf_field() }}
                <div class="form-group mb-3">
                    <label for="ID Outlet" class="form-label">Outlet</label>
                    <select name="id_outlet" class="form-select" style="width: 300px;">
                        <option value="">...</option>
                            @foreach ($outlet as $rw)
                                <option value="{{ $rw->id; }}"
                                    {{ old('id_outlet') == $rw->id ? 'selected' : '' }}>
                                    {{ $rw->nama_outlet }}
                                </option>
                            @endforeach
                    </select>

                        @if ($errors->has('id_outlet'))
                            <div class="text-danger">
                                {{ $errors->first('id_outlet') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                    <label for="Kode Invoice" class="form-label">Kode Invoice</label>
                    <input type="text" name="kode_invoice" class="form-control" readonly>

                        @if ($errors->has('kode_invoice'))
                            <div class="text-danger">
                                {{ $errors->first('kode_invoice') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                    <label for="ID Member" class="form-label">Member</label>
                    <select name="id_member" class="form-select" style="width: 300px;">
                        <option value="">...</option>
                            @foreach ($member as $rw)
                                <option value="{{ $rw->id; }}"
                                    {{ old('id_member') == $rw->id ? 'selected' : '' }}>
                                    {{ $rw->nama_member }}
                                </option>
                            @endforeach
                    </select>

                        @if ($errors->has('id_member'))
                            <div class="text-danger">
                                {{ $errors->first('id_member') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                    <label for="Tanggal" class="form-label">Tanggal</label>
                    <input name="tanggal" type="date" >
                    
                        @if ($errors->has('tanggal'))
                            <div class="text-danger">
                                {{ $errors->first('tanggal') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                    <label for="Batas Waktu" class="form-label">Batas Waktu</label>
                    <input name="batas_waktu" type="date" >
                    
                        @if ($errors->has('batas_waktu'))
                            <div class="text-danger">
                                {{ $errors->first('batas_waktu') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                    <label for="Tanggal Bayar" class="form-label">Tanggal Bayar</label>
                    <input name="tanggal_bayar" type="date" >
                    
                        @if ($errors->has('tanggal_bayar'))
                            <div class="text-danger">
                                {{ $errors->first('tanggal_bayar') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                        <label for="Biaya Tambahan" class="form-label">Biaya Tambahan</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <input type="text" name="biaya_tambahan" class="form-control" placeholder="Input Price..." value="{{ old('biaya_tambahan') }}" autocomplete="off">
                    </div>
                        @if ($errors->has('biaya_tambahan'))
                            <div class="text-danger">
                                {{ $errors->first('biaya_tambahan') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                        <label for="Diskon" class="form-label">Diskon</label>
                    <div class="input-group">
                        <span class="input-group-text">%</span>
                        <input type="text" name="diskon" class="form-control" placeholder="Input Discount..." value="{{ old('diskon') }}" autocomplete="off">
                    </div>
                        @if ($errors->has('diskon'))
                            <div class="text-danger">
                                {{ $errors->first('diskon') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                        <label for="Pajak" class="form-label">Pajak</label>
                    <div class="input-group">
                        <span class="input-group-text">%</span>
                        <input type="text" name="pajak" class="form-control" placeholder="Input Tax..." value="{{ old('pajak') }}" autocomplete="off">
                    </div>
                        @if ($errors->has('pajak'))
                            <div class="text-danger">
                                {{ $errors->first('pajak') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                    <label for="Status" class="form-label">Status</label>
                    <select name="status" class="form-select" style="width: 300px;">
                    <option selected value="">...</option>
                        <option value="baru" {{ old('role') == 'baru' ? 'selected' : '' }}>Baru</option>
                        <option value="proses" {{ old('role') == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ old('role') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="diambil" {{ old('role') == 'diambil' ? 'selected' : '' }}>Diambil</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="Status Dibayar" class="form-label">Status Dibayar</label>
                    <select name="dibayar" class="form-select" style="width: 300px;">
                    <option selected value="">...</option>
                        <option value="belum" {{ old('role') == 'belum' ? 'selected' : '' }}>Belum</option>
                        <option value="sudah" {{ old('role') == 'sudah' ? 'selected' : '' }}>Sudah</option>
                    </select>
                </div>
                
                



                

                

                <div class="form-group" style="float: right;">
                    <button type="submit" class="btn btn-primary" style="width: 100px;">Submit</button>
                    <button type="reset" class="btn btn-light" style="width: 100px;">Reset</button>
                    <a href="/transaksi" class="btn btn-dark" style="width: 100px;">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection