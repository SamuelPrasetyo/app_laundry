<?php

namespace App\Http\Controllers;

use App\Models\Outlet_Model;
use App\Models\PaketCucian_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PaketCucian_Controller extends Controller
{
    public function index()
    {
        return view('/crud/paket_cucian/index', ['paket' => PaketCucian_Model::paginate(5)]);
    }

    public function add()
    {
        $outlet = Outlet_Model::all();

        return view('/crud/paket_cucian/create', ['db' => $outlet]);
    }

    public function action_add(Request $request)
    {
        $this->validate($request, [
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required',
        ]);

        PaketCucian_Model::create([
            'id_outlet' => $request->id_outlet,
            'jenis' => $request->jenis,
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
        ]);

        Session::flash('Sukses', 'Data berhasil di input !');

        return redirect('/paket');
    }

    public function edit($id)
    {
        $paket = PaketCucian_Model::find($id);
        $outlet = Outlet_Model::all();

        return view('/crud/paket_cucian/update', ['paket' => $paket, 'db' => $outlet]);
    }

    public function action_edit($id, Request $request)
    {
        $this->validate($request, [
            'id_outlet' => 'required',
            'jenis' => 'required',
            'nama_paket' => 'required',
            'harga' => 'required',
        ]);

        $paket = PaketCucian_Model::find($id);
        $paket->id_outlet = $request->id_outlet;
        $paket->jenis = $request->jenis;
        $paket->nama_paket = $request->nama_paket;
        $paket->harga = $request->harga;
        $paket->save();

        Session::flash('Sukses', 'Data berhasil di update !');

        return redirect('/paket');
    }

    public function delete($id)
    {
        PaketCucian_Model::find($id)->delete();

        Session::flash('Sukses', 'Data berhasil di hapus !');

        return redirect('/paket');
    }

    public function trash()
    {
        $paket = PaketCucian_Model::onlyTrashed()->paginate(5);

        return view('/crud/paket_cucian/trash', ['paket_trash' => $paket]);
    }

    public function restore($id)
    {
        PaketCucian_Model::onlyTrashed()
            ->where('id', $id)
            ->restore();

        Session::flash('Sukses', 'Data berhasil di restore');

        return redirect('/paket/trash');
    }

    public function restore_all()
    {
        PaketCucian_Model::onlyTrashed()->restore();

        Session::flash('Sukses', 'Semua data berhasil di restore !');

        return redirect('/paket/trash');
    }

    public function hapus_permanen($id)
    {
        PaketCucian_Model::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
        
        Session::flash('Sukses', 'Data berhasil di hapus permanen !');

        return redirect('/paket/trash');
    }

    public function hapus_permanen_semua()
    {
        PaketCucian_Model::onlyTrashed()->forceDelete();
        
        Session::flash('Sukses', 'Semua data berhasil di hapus permanen !');

        return redirect('/paket/trash');
    }

    public function cari(Request $request)
    {
        $pencarian = $request->cari;

        $pencarian = PaketCucian_Model::where('nama_outlet', 'like', "%".$pencarian."%")
                ->orWhere('jenis', 'like', "%".$pencarian."%")
                ->orWhere('nama_paket', 'like', "%".$pencarian."%")
                ->orWhere('harga', 'like', "%".$pencarian."%")
                ->paginate();
        
        return view('/crud/paket_cucian/search', ['paket' => $pencarian]);
    }

    public function cari_trash(Request $request)
    {
        $pencarian = $request->cari;

        $pencarian = PaketCucian_Model::onlyTrashed()->where('nama_outlet', 'like', "%".$pencarian."%")
                ->orWhere('jenis', 'like', "%".$pencarian."%")
                ->orWhere('nama_paket', 'like', "%".$pencarian."%")
                ->orWhere('harga', 'like', "%".$pencarian."%")
                ->paginate();
        
        return view('/crud/paket_cucian/search_trash', ['paket_trash' => $pencarian]);
    }
}
