<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SyaratPPDB;
use Illuminate\Http\Request;

class SyaratController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        return view('admin.syarat.index', [
            'title' => 'Syarat PPDB',
            'active' => 'syarat_ppdb',
            'syarat_ppdb' => SyaratPPDB::first()->get()
        ]);
    }

    public function create()
    {
        return view('admin.syarat.create', [
            'title' => 'Syarat PPDB',
            'active' => 'syarat_ppdb',
        ]);
    }

    public function store(Request $request)
    {
        SyaratPPDB::create($request->all());

        return redirect()->route('admin-ppdb-syarat.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = SyaratPPDB::find($id);
        return view('admin.syarat.edit', [
            'title' => 'Syarat PPDB',
            'active' => 'syarat_ppdb',
            'syarat_ppdb' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = SyaratPPDB::find($id);
        $data->update($request->all());
        return redirect()->route('admin-ppdb-syarat.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = SyaratPPDB::find($id);
        $data->delete();
        return redirect()->route('admin-ppdb-syarat.index')->with('success', 'Data Berhasil Dihapus');
    }
}
