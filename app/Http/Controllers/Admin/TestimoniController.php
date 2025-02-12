<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        $testimoni = Testimoni::get();

        return view('admin.testimoni.index', [
            'title' => 'Testimoni',
            'active' => 'testimoni',
            'testimoni' => $testimoni,
        ]);
    }

    public function create()
    {
        return view('admin.testimoni.create', [
            'title' => 'Testimoni',
            'active' => 'testimoni',
        ]);
    }

    public function store(Request $request)
    {

        Testimoni::create($request->all());

        return redirect()->route('admin-testimoni.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = Testimoni::find($id);
        return view('admin.testimoni.edit', [
            'title' => 'Testimoni',
            'active' => 'testimoni',
            'testimoni' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Testimoni::find($id);
        $data->update($request->all());
        return redirect()->route('admin-testimoni.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = Testimoni::find($id);
        $data->delete();
        return redirect()->route('admin-testimoni.index')->with('success', 'Data Berhasil Dihapus');
    }
}
