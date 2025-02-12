<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\ImageFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ImageFasilitasController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        $data = ImageFasilitas::with('fasilitas')->orderBy('id_fasilitas')->get();
        return view('admin.image_fasilitas.index', [
            'title' => 'Fasilitas',
            'active' => 'image-fasilitas',
            'image_fasilitas' => $data
        ]);
    }

    public function create()
    {
        $data = Fasilitas::all();
        return view('admin.image_fasilitas.create', [
            'title' => 'Fasilitas',
            'active' => 'image-fasilitas',
            'id_fasilitas' => $data,
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

        ImageFasilitas::create([
            'id_fasilitas' => $request->id_fasilitas,
            'image' => $image
        ]);


        return redirect()->route('admin-image-fasilitas.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $fasilitas = Fasilitas::all();
        $data = ImageFasilitas::find($id);
        if (!$data) {
            return redirect()->route('admin-image-fasilitas.index')->with('error', 'Data tidak ditemukan');
        }
        return view('admin.image_fasilitas.edit', [
            'title' => 'Fasilitas',
            'active' => 'image-fasilitas',
            'image_fasilitas' => $data,
            'id_fasilitas' => $fasilitas,

        ]);
    }

    public function update(Request $request, $id)
    {
        $data = ImageFasilitas::find($id);
        $data->id_fasilitas = $request->id_fasilitas;
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
        return redirect()->route('admin-image-fasilitas.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = ImageFasilitas::find($id);
        $image = $data->image;
        if ($image) {
            $imagePath = public_path('assets/img/fasilitas/') . $image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $data->delete();
        return redirect()->route('admin-image-fasilitas.index')->with('success', 'Data Berhasil Dihapus');
    }
}
