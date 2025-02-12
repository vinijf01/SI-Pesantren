<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        $visi_misi = VisiMisi::latest()->first();
        return view('admin.visi_misi.index', [
            'title' => 'Visi Misi',
            'active' => 'visi_misi',
            'visi_misi' => $visi_misi,

        ]);
    }

    public function edit($id)
    {
        $data = VisiMisi::find($id);
        return view('admin.visi_misi.edit', [
            'title' => 'Visi Misi',
            'active' => 'visi_misi',
            'visi_misi' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = VisiMisi::find($id);
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);
        $data->update($request->all());
        return redirect()->route('admin-visi-misi.index')->with('success', 'Data Berhasil Disimpan');
    }
}
