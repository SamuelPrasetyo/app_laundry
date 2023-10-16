@extends('layouts.app')

@section('title', 'Create User')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>Tambah Data Pengguna</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="/user/action_create">
                {{ csrf_field() }}
                <div class="form-group mb-3">
                    <label for="Nama User" class="form-label">Nama User</label>
                    <input type="text" name="nama_user" class="form-control" placeholder="Input Username..." value="{{ old('nama_user') }}" autocomplete="off">

                        @if ($errors->has('nama_user'))
                            <div class="text-danger">
                                {{ $errors->first('nama_user') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Input Email..." value="{{ old('email') }}" autocomplete="off">

                        @if ($errors->has('email'))
                            <div class="text-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                </div>
                <div class="form-group mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" placeholder="Input Password..." value="{{ old('password') }}" autocomplete="off">

                        @if ($errors->has('password'))
                            <div class="text-danger">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                </div>

                <div class="form-group mb-3">
                    <label for="Role" class="form-label">Role</label>
                    <select name="role" class="form-select" style="width: 300px;">
                        <option selected value="">...</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="kasir" {{ old('role') == 'kasir' ? 'selected' : '' }}>Kasir</option>
                        <option value="owner" {{ old('role') == 'owner' ? 'selected' : '' }}>Owner</option>
                    </select>            

                        @if ($errors->has('role'))
                            <div class="text-danger">
                                {{ $errors->first('role') }}
                            </div>
                        @endif
                </div>

                <div class="form-group" style="float: right;">
                    <button type="submit" class="btn btn-primary" style="width: 100px;">Submit</button>
                    <button type="reset" class="btn btn-light" style="width: 100px;">Reset</button>
                    <a href="/user" class="btn btn-dark" style="width: 100px;">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection