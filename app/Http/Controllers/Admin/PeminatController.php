<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminat;
use App\Models\ProgramAkademik;
use Illuminate\Http\Request;

class PeminatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        return view('admin.peminat.index', [
            'title' => 'Peminat Program',
            'active' => 'peminat',
            'peminat' => Peminat::with('programAkademik')->latest()->get()
        ]);
    }


    public function edit($id)
    {
        $program = ProgramAkademik::all();
        $data = Peminat::find($id);
        return view('admin.peminat.edit', [
            'title' => 'Peminat Program',
            'active' => 'peminat',
            'peminat' => $data,
            'program' => $program,

        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Peminat::find($id);
        $data->update($request->all());
        return redirect()->route('admin-ppdb-peminat.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = Peminat::find($id);
        $data->delete();
        return redirect()->route('admin-ppdb-peminat.index')->with('success', 'Data Berhasil Dihapus');
    }
}
