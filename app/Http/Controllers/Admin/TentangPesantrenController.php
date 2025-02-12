<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kuantitatif;
use App\Models\TentangPesantren;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Test;

class TentangPesantrenController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        $tentang_pesantren = TentangPesantren::latest()->first();
        $data_kuantitatif = Kuantitatif::latest()->get();

        return view('admin.tentang_pesantren.index', [
            'title' => 'Tentang Pesantren',
            'title2' => 'Data Kuantitatif',
            'active' => 'tentang_pesantren',
            'tentang_pesantren' => $tentang_pesantren,
            'data_kuantitatif' => $data_kuantitatif
        ]);
    }

    public function edit($id)
    {
        $tentang_pesantren = TentangPesantren::find($id);

        if (!$tentang_pesantren) {
            return redirect()->route('admin-tentang-pesantren.index')->with('error', 'Data Pesantren tidak ditemukan');
        }

        return view('admin.tentang_pesantren.edit', [
            'title' => 'Tentang Pesantren',
            'active' => 'tentang_pesantren',
            'tentang_pesantren' => $tentang_pesantren
        ]);
    }


    public function update(Request $request, $id)
    {
        $tentang_pesantren = TentangPesantren::find($id);
        $tentang_pesantren->judul = $request->judul;
        $tentang_pesantren->deskripsi = $request->deskripsi;
        $tentang_pesantren->keterangan_video = $request->keterangan_video;
        $tentang_pesantren->link_video = $request->link_video;
        $oldImage = $tentang_pesantren->foto;

        if ($request->file('foto')) {
            $file = $request->file('foto');

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/img/promotion/'), $filename);
            $tentang_pesantren['foto'] = $filename;

            if ($oldImage && $oldImage != 'default.png') {
                $oldImagePath = public_path('assets/img/promotion/') . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }
        $tentang_pesantren->save();

        // Redirect
        return redirect()->route('admin-tentang-pesantren.index')->with('success', 'Data Berhasil Disimpan');
    }

    // DATA KUANTITATIF
    public function create()
    {
        return view('admin.tentang_pesantren.create', [
            'title' => 'Data Kuantitatif',
            'active' => 'tentang_pesantren',

        ]);
    }

    public function store(Request $request)
    {

        Kuantitatif::create($request->all());

        return redirect()->route('admin-tentang-pesantren.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit_dk($id)
    {
        $data = Kuantitatif::find($id);
        return view('admin.tentang_pesantren.edit_dk', [
            'title' => 'Data Kuantitatif',
            'active' => 'tentang_pesantren',
            'data_kuantitatif' => $data
        ]);
    }

    public function update_dk(Request $request, $id)
    {
        $data = Kuantitatif::find($id);
        $data->update($request->all());
        return redirect()->route('admin-tentang-pesantren.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = Kuantitatif::find($id);
        $data->delete();
        return redirect()->route('admin-tentang-pesantren.index')->with('success', 'Data Berhasil Dihapus');
    }
}
