@extends('layouts.app')

@section('title', 'Update User')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h3>Update Data User</h3>
        </div>

        <div class="card-body">
            <form action="/user/action_update/{{ $user->id }}" method="post">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group mb-3">
                    <label for="Nama User" class="form-label">Nama User</label>
                    <input type="text" name="name" class="form-control" placeholder="Input Nama User..." value="{{ $user->name }}" autocomplete="off">
                    
                        @if ($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                </div>

                <div class="form-group mb-3">
                        <label for="Email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text">@</span>
                        <input type="text" name="email" class="form-control" placeholder="Input Email..." value="{{ $user->email }}" autocomplete="off">
                    </div>
                            @if ($errors->has('email'))
                                <div class="text-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                </div>

                <div class="form-group mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Input Password..." value="{{ $user->password }}" autocomplete="off">
                    
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
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : ''}}>Admin</option>
                        <option value="kasir" {{ $user->role == 'kasir' ? 'selected' : ''}}>Kasir</option>
                        <option value="owner" {{ $user->role == 'owner' ? 'selected' : ''}}>Owner</option>
                    </select>

                        @if ($errors->has('role'))
                            <div class="text-danger">
                                {{ $errors->first('role') }}
                            </div>
                        @endif
                </div>
                    
            <div class="form-group">
                <button type="submit" class="btn btn-warning" style="width: 100px;">Update</button>
                <a href="/user" class="btn btn-light" style="width: 100px;">Back</a>
            </div>
            </form>
        </div>

    </div>
</div>
@endsection