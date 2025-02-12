<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KetClass;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeteranganClassController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        return view('admin.keterangan_kelas.index', [
            'title' => 'Keterangan Kelas',
            'active' => 'keterangan_kelas',
            'keterangan_kelas' => KetClass::with('program')->latest()->get()
        ]);
    }

    public function edit($id)
    {
        $keterangan_kelas = KetClass::find($id);

        if (!$keterangan_kelas) {
            return redirect()->route('admin-keterangan-kelas.index')->with('error', 'Data Pesantren tidak ditemukan');
        }

        return view('admin.keterangan_kelas.edit', [
            'title' => 'Keterangan Kelas',
            'active' => 'keterangan_kelas',
            'keterangan_kelas' => $keterangan_kelas
        ]);
    }


    public function update(Request $request, $id)
    {
        $keterangan_kelas = KetClass::find($id);
        $keterangan_kelas->judul_1 = $request->judul_1;
        $keterangan_kelas->deskripsi_judul_1 = $request->deskripsi_judul_1;
        $keterangan_kelas->judul_2 = $request->judul_2;
        $keterangan_kelas->deskripsi_judul_2 = $request->deskripsi_judul_2;
        $oldImage = $keterangan_kelas->image;

        $request->validate([
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'deskripsi_judul_1' => 'required',
            'deskripsi_judul_2' => 'required',
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');

            $filename = Str::uuid() . '.' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/program/'), $filename);
            $keterangan_kelas['image'] = $filename;

            if ($oldImage) {
                $oldImagePath = public_path('assets/img/program/') . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }
        $keterangan_kelas->save();

        // Redirect
        return redirect()->route('admin-keterangan-kelas.index')->with('success', 'Data Berhasil Disimpan');
    }
}
