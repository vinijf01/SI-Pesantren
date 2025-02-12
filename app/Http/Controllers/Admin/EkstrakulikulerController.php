<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EkstrakulikulerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        return view('admin.ekstrakulikuler.index', [
            'title' => 'Program Ekstrakulikuler',
            'active' => 'ekstrakulikuler',
            'ekstrakulikuler' => Ekstrakulikuler::get()
        ]);
    }

    public function create()
    {
        return view('admin.ekstrakulikuler.create', [
            'title' => 'Program Ekstrakulikuler',
            'active' => 'ekstrakulikuler',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->file('image')) {
            $file = $request->file('image');

            $filename = Str::uuid() . '.' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/ekstrakulikuler/'), $filename);
            $image = $filename;
        }
        Ekstrakulikuler::create([
            'nama_ekstrakulikuler' => $request->nama_ekstrakulikuler,
            'waktu_per_minggu' => $request->waktu_per_minggu,
            'jam_per_periode' => $request->jam_per_periode,
            'image' => $image
        ]);
        return redirect()->route('admin-ekstrakulikuler.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = Ekstrakulikuler::find($id);
        if (!$data) {
            return redirect()->route('admin-ekstrakulikuler.index')->with('error', 'Data tidak ditemukan');
        }
        return view('admin.ekstrakulikuler.edit', [
            'title' => 'Program Ekstrakulikuler',
            'active' => 'ekstrakulikuler',
            'ekstrakulikuler' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Ekstrakulikuler::find($id);
        $data->nama_ekstrakulikuler = $request->nama_ekstrakulikuler;
        $data->waktu_per_minggu = $request->waktu_per_minggu;
        $data->jam_per_periode = $request->jam_per_periode;
        $oldImage = $data->image;

        if ($request->file('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $file = $request->file('image');

            $filename = Str::uuid() . '.' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/ekstrakulikuler/'), $filename);
            $data['image'] = $filename;

            if ($oldImage) {
                $oldImagePath = public_path('assets/img/ekstrakulikuler/') . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        $data->save();
        return redirect()->route('admin-ekstrakulikuler.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = Ekstrakulikuler::find($id);
        $image = $data->image;
        if ($image) {
            $imagePath = public_path('assets/img/ekstrakulikuler/') . $image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $data->delete();
        return redirect()->route('admin-ekstrakulikuler.index')->with('success', 'Data Berhasil Dihapus');
    }
}
