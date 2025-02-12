<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BiayaPendidikan;
use Illuminate\Http\Request;

class BiayaPendidikanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        return view('admin.biaya_pendidikan.index', [
            'title' => 'Biaya Pendidikan',
            'active' => 'biaya_pendidikan',
            'biaya_pendidikan' => BiayaPendidikan::get()
        ]);
    }

    public function create()
    {
        return view('admin.biaya_pendidikan.create', [
            'title' => 'Biaya Pendidikan',
            'active' => 'biaya_pendidikan',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required'
        ]);

        BiayaPendidikan::create($request->all());
        return redirect()->route('admin-ppdb-biaya-pendidikan.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = BiayaPendidikan::find($id);
        return view('admin.biaya_pendidikan.edit', [
            'title' => 'Biaya Pendidikan',
            'active' => 'biaya_pendidikan',
            'biaya_pendidikan' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = BiayaPendidikan::find($id);
        $request->validate([
            'deskripsi' => 'required'
        ]);
        $data->update($request->all());
        return redirect()->route('admin-ppdb-biaya-pendidikan.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = BiayaPendidikan::find($id);
        $data->delete();
        return redirect()->route('admin-ppdb-biaya-pendidikan.index')->with('success', 'Data Berhasil Dihapus');
    }
}
