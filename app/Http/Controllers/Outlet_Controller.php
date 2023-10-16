<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet_Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Outlet_Controller extends Controller
{
    public function index()
    {
        // $data = Outlet_Model::all();
        // return view('/crud/outlet/index', ['outlet' => $data]);
        return view('/crud/outlet/index', ['outlet' => Outlet_Model::paginate(5)]);
    }

    public function add()
    {
        return view('/crud/outlet/create');
    }

    public function action_add(Request $req)
    {
        $this->validate($req, [
            'nama_outlet' => 'required|max:100',
            'alamat' => 'required|max:300',
            'telepon' => 'required|max:15',
        ]);

        Outlet_Model::create([
            'nama_outlet' => $req->nama_outlet,
            'alamat' => $req->alamat,
            'telepon' => $req->telepon,
        ]);

        // DB::table('outlet')->insert([
        //     'nama_outlet' => $req->nama_outlet_outlet,
        //     'alamat' => $req->alamat,
        //     'telepon' => $req->nomor_telepon,
        // ]);

        Session::flash('Sukses', 'Data berhasil di input !');

        return redirect('/outlet');
    }

    public function edit($id)
    {
        $outlet = Outlet_Model::find($id);

        return view('/crud/outlet/update', ['outlet' => $outlet]);
    }

    public function action_edit($id, Request $req)
    {
        $this->validate($req, [
            'nama_outlet' => 'required|max:100',
            'alamat' => 'required|max:300',
            'telepon' => 'required|max:15',
        ]);

        $outlet = Outlet_Model::find($id);
        $outlet->nama_outlet = $req->nama_outlet;
        $outlet->alamat = $req->alamat;
        $outlet->telepon = $req->telepon;
        $outlet->save();

        // $outlet->save([
        //     'nama_outlet' => $req->nama_outlet,
        //     'alamat' => $req->alamat,
        //     'telepon' => $req->telepon
        // ]);

        Session::flash('Sukses', 'Data berhasil di update !');
    
        return redirect('/outlet');
    }

    public function delete($id)
    {
        Outlet_Model::find($id)->delete();

        Session::flash('Sukses', 'Data berhasil di hapus !');

        // DB::table('outlet')->delete($id);

        return redirect('/outlet');
    }

    public function trash()
    {
        $outlet = Outlet_Model::onlyTrashed()->paginate(5);
        return view('/crud/outlet/trash', ['outlet_trash' => $outlet]);
    }

    public function restore($id)
    {
        Outlet_Model::onlyTrashed()
            ->where('id', $id)
            ->restore();
        
        Session::flash('Sukses', 'Data berhasil di restore !');

        return redirect('/outlet/trash');
    }

    public function restore_all()
    {
        Outlet_Model::onlyTrashed()->restore();
        
        Session::flash('Sukses', 'Semua data berhasil di restore !');

        return redirect('/outlet/trash');
    }

    public function hapus_permanen($id)
    {
        Outlet_Model::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();

        Session::flash('Sukses', 'Data berhasil di hapus permanen !');

        return redirect('/outlet/trash');
    }

    public function hapus_permanen_semua()
    {
        Outlet_Model::onlyTrashed()->forceDelete();

        Session::flash('Sukses', 'Semua data berhasil di hapus permanen !');

        return redirect('/outlet/trash');
    }

    public function cari(Request $req)
    {
        $pencarian = $req->cari;

        $pencarian = Outlet_Model::where('nama_outlet', 'like', "%".$pencarian."%")
                ->orWhere('alamat', 'like', "%".$pencarian."%")
                ->orWhere('telepon', 'like', "%".$pencarian."%")
                ->paginate();

        return view('/crud/outlet/search', ['outlet' => $pencarian]);
    }

    public function cari_trash(Request $req)
    {
        $pencarian = $req->cari;

        $pencarian = Outlet_Model::onlyTrashed()->where('nama_outlet', 'like', "%".$pencarian."%")
                ->orWhere('alamat', 'like', "%".$pencarian."%")
                ->orWhere('telepon', 'like', "%".$pencarian."%")
                ->paginate();

        return view('/crud/outlet/search_trash', ['outlet_trash' => $pencarian]);
    }
}
