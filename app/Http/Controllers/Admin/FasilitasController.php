<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FasilitasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        return view('admin.fasilitas.index', [
            'title' => 'Fasilitas',
            'active' => 'fasilitas',
            'fasilitas' => Fasilitas::get()
        ]);
    }

    public function create()
    {
        return view('admin.fasilitas.create', [
            'title' => 'Fasilitas',
            'active' => 'fasilitas',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');

            $filename = Str::uuid() . '_' .  $file->getClientOriginalName();
            $file->move(public_path('assets/img/fasilitas/'), $filename);
            $image = $filename;
        }

        Fasilitas::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'image' => $image
        ]);
        return redirect()->route('admin-fasilitas.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = Fasilitas::find($id);
        if (!$data) {
            return redirect()->route('admin-fasilitas.index')->with('error', 'Data tidak ditemukan');
        }
        return view('admin.fasilitas.edit', [
            'title' => 'Fasilitas',
            'active' => 'fasilitas',
            'fasilitas' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Fasilitas::find($id);
        $data->nama = $request->nama;
        $data->keterangan = $request->keterangan;
        $oldImage = $data->image;

        if ($request->file('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $file = $request->file('image');

            $filename = Str::uuid() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/fasilitas/'), $filename);
            $data['image'] = $filename;

            if ($oldImage) {
                $oldImagePath = public_path('assets/img/fasilitas/') . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        $data->save();
        return redirect()->route('admin-fasilitas.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = Fasilitas::find($id);
        $image = $data->image;
        if ($image) {
            $imagePath = public_path('assets/img/fasilitas/') . $image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $data->delete();
        return redirect()->route('admin-fasilitas.index')->with('success', 'Data Berhasil Dihapus');
    }
}
