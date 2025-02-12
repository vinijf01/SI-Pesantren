<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hafalan;
use App\Models\User;
use Illuminate\Http\Request;

class HafalanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        $hafalan = Hafalan::with('user', 'user.santri.programAkademik')
            ->orderBy('id_santri')
            ->get();

        return view('admin.hafalan.index', [
            'title' => 'Hafalan',
            'active' => 'hafalan',
            'hafalan' => $hafalan,
        ]);
    }

    public function create()
    {
        $santri = User::where('is_permission', 2)->get();

        return view('admin.hafalan.create', [
            'title' => 'Hafalan',
            'active' => 'hafalan',
            'santri' => $santri,

        ]);
    }

    public function store(Request $request)
    {

        Hafalan::create($request->all());

        return redirect()->route('admin-hafalan-santri.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = Hafalan::find($id);
        $santri = User::where('is_permission', 2)->get();

        return view('admin.hafalan.edit', [
            'title' => 'Hafalan',
            'active' => 'hafalan',
            'hafalan' => $data,
            'santri' => $santri,

        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Hafalan::find($id);
        $data->update($request->all());
        return redirect()->route('admin-hafalan-santri.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = Hafalan::find($id);
        $data->delete();
        return redirect()->route('admin-hafalan-santri.index')->with('success', 'Data Berhasil Dihapus');
    }
}
