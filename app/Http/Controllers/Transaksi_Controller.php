<?php

namespace App\Http\Controllers;

use App\Models\CreateUser_Model;
use App\Models\Member_Model;
use App\Models\Outlet_Model;
use App\Models\Transaksi_Model;
use Illuminate\Http\Request;

class Transaksi_Controller extends Controller
{
    public function index()
    {
        return view('/crud/entri_transaksi/index', ['transaksi' => Transaksi_Model::paginate(5)]);
    }

    public function add()
    {
        $outlet = Outlet_Model::all();
        $member = Member_Model::all();
        $user = CreateUser_Model::all();
        
        return view('crud.entri_transaksi.create', ['outlet' => $outlet, 'member' => $member, 'user' => $user]);
    }
}
