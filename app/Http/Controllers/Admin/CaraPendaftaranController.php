<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaraPendaftaran;
use Illuminate\Http\Request;

class CaraPendaftaranController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        return view('admin.cara_pendaftaran.index', [
            'title' => 'Tata Cara Pendaftaran',
            'active' => 'cara_pendaftaran',
            'cara_pendaftaran' => CaraPendaftaran::get()
        ]);
    }

    public function create()
    {
        return view('admin.cara_pendaftaran.create', [
            'title' => 'Tata Cara Pendaftaran',
            'active' => 'cara_pendaftaran',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi' => 'required'
        ]);
        CaraPendaftaran::create($request->all());

        return redirect()->route('admin-ppdb-cara-pendaftaran.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = CaraPendaftaran::find($id);
        return view('admin.cara_pendaftaran.edit', [
            'title' => 'Tata Cara Pendaftaran',
            'active' => 'cara_pendaftaran',
            'cara_pendaftaran' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = CaraPendaftaran::find($id);
        $request->validate([
            'deskripsi' => 'required'
        ]);
        $data->update($request->all());
        return redirect()->route('admin-ppdb-cara-pendaftaran.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = CaraPendaftaran::find($id);
        $data->delete();
        return redirect()->route('admin-ppdb-cara-pendaftaran.index')->with('success', 'Data Berhasil Dihapus');
    }
}
