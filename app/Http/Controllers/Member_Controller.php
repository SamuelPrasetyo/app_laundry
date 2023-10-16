<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member_Model;
use Illuminate\Support\Facades\Session;

class Member_Controller extends Controller
{
    public function index()
    {
        return view('/crud/member/index', ['member' => Member_Model::paginate(5)]);
    }

    public function add()
    {
        return view('/crud/member/create');
    }

    public function action_add(Request $request)
    {
        $this->validate($request, [
            'nama_member' => 'required|max:100',
            'alamat' => 'required|max:300',
            'jenis_kelamin' => 'required',
            'telepon' => 'required|max:15',
        ]);

        Member_Model::create([
            'nama_member' => $request->nama_member,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telepon' => $request->telepon,
        ]);

        Session::flash('Sukses', 'Data berhasil di input !');

        return redirect('/member');
    }

    public function edit($id)
    {
        $member = Member_Model::find($id);

        return view('/crud/member/update', ['member' => $member]);
    }

    public function action_edit($id, Request $request)
    {
        $this->validate($request, [
            'nama_member' => 'required|max:100',
            'alamat' => 'required|max:300',
            'jenis_kelamin' => 'required',
            'telepon' => 'required|max:15',
        ]);

        $member = Member_Model::find($id);
        $member->nama_member = $request->nama_member;
        $member->alamat = $request->alamat;
        $member->jenis_kelamin = $request->jenis_kelamin;
        $member->telepon = $request->telepon;
        $member->save();

        Session::flash('Sukses', 'Data berhasil di update !');

        return redirect('/member');
    }

    public function delete($id)
    {
        Member_Model::find($id)->delete();

        Session::flash('Sukses', 'Data berhasil di hapus !');

        return redirect('/member');
    }

    public function trash()
    {
        $member = Member_Model::onlyTrashed()->paginate(5);
        return view('/crud/member/trash', ['member_trash' => $member]);
    }

    public function restore($id)
    {
        Member_Model::onlyTrashed()
            ->where('id', $id)
            ->restore();

        Session::flash('Sukses', 'Data berhasil di restore !');

        return redirect('/member/trash');
    }

    public function restore_all()
    {
        Member_Model::onlyTrashed()->restore();
        
        Session::flash('Sukses', 'Semua data berhasil di restore !');

        return redirect('/member/trash');
    }

    public function hapus_permanen($id)
    {
        Member_Model::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();

        Session::flash('Sukses', 'Data berhasil di hapus permanen !');

        return redirect('/member/trash');
    }

    public function hapus_permanen_semua()
    {
        Member_Model::onlyTrashed()->forceDelete();

        Session::flash('Sukses', 'Semua data berhasil di hapus permanen !');

        return redirect('/member/trash');
    }

    public function cari(Request $req)
    {
        $pencarian = $req->cari;

        $pencarian = Member_Model::where('nama_member', 'like', "%".$pencarian."%")
                ->orWhere('alamat', 'like', "%".$pencarian."%")
                ->orWhere('jenis_kelamin', 'like', "%".$pencarian."%")
                ->orWhere('telepon', 'like', "%".$pencarian."%")
                ->paginate();

        return view('/crud/member/search', ['member' => $pencarian]);
    }

    public function cari_trash(Request $req)
    {
        $pencarian = $req->cari;

        $pencarian = Member_Model::onlyTrashed()->where('nama_member', 'like', "%".$pencarian."%")
                ->orWhere('alamat', 'like', "%".$pencarian."%")
                ->orWhere('jenis_kelamin', 'like', "%".$pencarian."%")
                ->orWhere('telepon', 'like', "%".$pencarian."%")
                ->paginate();

        return view('/crud/member/search_trash', ['member_trash' => $pencarian]);
    }
}
