<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        return view('admin.galeri.index', [
            'title' => 'Galeri',
            'active' => 'galeri',
            'berita' => Galeri::get()
        ]);
    }

    public function create()
    {
        return view('admin.galeri.create', [
            'title' => 'Galeri',
            'active' => 'galeri',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto');

            $filename = Str::uuid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/gallery/'), $filename);
            $image = $filename;
        }
        Galeri::create([
            'nama' => $request->nama,
            'foto' => $image
        ]);

        return redirect()->route('admin-galeri.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = Galeri::find($id);

        if (!$data) {
            return redirect()->route('admin-galeri.index')->with('error', 'Data tidak ditemukan');
        }
        return view('admin.galeri.edit', [
            'title' => 'Galeri',
            'active' => 'galeri',
            'galeri' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Galeri::find($id);
        $data->nama = $request->nama;
        $oldImage = $data->foto;

        if ($request->file('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $file = $request->file('foto');

            $filename = Str::uuid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/gallery/'), $filename);
            $data['foto'] = $filename;

            if ($oldImage) {
                $oldImagePath = public_path('assets/img/gallery/') . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        $data->save();
        return redirect()->route('admin-galeri.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = Galeri::find($id);
        $image = $data->foto;
        if ($image) {
            $imagePath = public_path('assets/img/gallery/') . $image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $data->delete();
        return redirect()->route('admin-galeri.index')->with('success', 'Data Berhasil Dihapus');
    }
}
