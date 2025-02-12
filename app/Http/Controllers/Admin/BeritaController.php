<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        return view('admin.berita.index', [
            'title' => 'Berita',
            'active' => 'berita',
            'berita' => Berita::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.berita.create', [
            'title' => 'Berita',
            'active' => 'berita',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'isi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto');

            $filename = Str::uuid() . '.' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/blog/'), $filename);
            $image = $filename;
        }
        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'penulis' => $request->penulis,
            'foto' => $image
        ]);


        return redirect()->route('admin-berita.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = Berita::find($id);
        if (!$data) {
            return redirect()->route('admin-berita.index')->with('error', 'Data tidak ditemukan');
        }
        return view('admin.berita.edit', [
            'title' => 'Berita',
            'active' => 'berita',
            'berita' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Berita::find($id);
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        $data->penulis = $request->penulis;
        $oldImage = $data->foto;

        if ($request->file('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $file = $request->file('foto');

            $filename = Str::uuid() . '.' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/blog/'), $filename);
            $data['foto'] = $filename;

            if ($oldImage) {
                $oldImagePath = public_path('assets/img/blog/') . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }
        $request->validate([
            'isi' => 'required',
        ]);

        $data->save();
        return redirect()->route('admin-berita.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = Berita::find($id);
        $image = $data->foto;
        if ($image) {
            $imagePath = public_path('assets/img/blog/') . $image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $data->delete();
        return redirect()->route('admin-berita.index')->with('success', 'Data Berhasil Dihapus');
    }
}
