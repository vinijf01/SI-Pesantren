<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KataPengantar;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KataPengantarController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        return view('admin.kata_pengantar.index', [
            'title' => 'Kata Pengantar',
            'active' => 'kata_pengantar',
            'kata_pengantar' => KataPengantar::get()
        ]);
    }

    public function create()
    {
        return view('admin.kata_pengantar.create', [
            'title' => 'Kata Pengantar',
            'active' => 'kata_pengantar',
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto');

            $filename = Str::uuid() . '.' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/teacher/'), $filename);
            $image = $filename;
        }
        KataPengantar::create([
            'keterangan' => $request->keterangan,
            'kata_pengantar' => $request->kata_pengantar,
            'foto' => $image
        ]);
        return redirect()->route('admin-kata-pengantar.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = KataPengantar::find($id);
        if (!$data) {
            return redirect()->route('admin-kata-pengantar.index')->with('error', 'Data tidak ditemukan');
        }
        return view('admin.kata_pengantar.edit', [
            'title' => 'Kata Pengantar',
            'active' => 'kata_pengantar',
            'kata_pengantar' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = KataPengantar::find($id);
        $data->keterangan = $request->keterangan;
        $data->kata_pengantar = $request->kata_pengantar;
        $oldImage = $data->foto;

        if ($request->file('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $file = $request->file('foto');

            $filename = Str::uuid() . '.' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/teacher/'), $filename);
            $data['foto'] = $filename;

            if ($oldImage) {
                $oldImagePath = public_path('assets/img/teacher/') . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        $data->save();
        return redirect()->route('admin-kata-pengantar.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = KataPengantar::find($id);
        $image = $data->foto;
        if ($image) {
            $imagePath = public_path('assets/img/teacher/') . $image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $data->delete();
        return redirect()->route('admin-kata-pengantar.index')->with('success', 'Data Berhasil Dihapus');
    }
}
