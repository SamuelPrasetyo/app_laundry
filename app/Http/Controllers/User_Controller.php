<?php

namespace App\Http\Controllers;

use App\Models\CreateUser_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class User_Controller extends Controller
{
    public function index()
    {
        return view('/crud/users/index', ['user' => CreateUser_Model::paginate(5)]);
    }

    public function add()
    {
        return view('/crud/users/create');
    }

    public function action_add(Request $request)
    {
        $this->validate($request, [
            'nama_user' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        CreateUser_Model::create([
            'name' => $request->nama_user,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'role' => $request->role,
        ]);

        Session::flash('Sukses', 'Data berhasil di input !');

        return redirect('/user');
    }

    public function edit($id)
    {
        $user = CreateUser_Model::find($id);

        return view('/crud/users/update', ['user' => $user]);
    }

    public function action_edit()
    {
        # code...
    }
}
