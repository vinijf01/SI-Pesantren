<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroPPDB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HeroPPDBController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        $hero_ppdb = HeroPPDB::latest()->first();

        return view('admin.hero_ppdb.index', [
            'title' => 'PPDB',
            'active' => 'hero_ppdb',
            'hero_ppdb' => $hero_ppdb
        ]);
    }

    public function edit($id)
    {
        $hero_ppdb = HeroPPDB::find($id);

        if (!$hero_ppdb) {
            return redirect()->route('admin-hero-ppdb.index')->with('error', 'Data Hero tidak ditemukan');
        }

        return view('admin.hero_ppdb.edit', [
            'title' => 'PPDB',
            'active' => 'hero_ppdb',
            'hero_ppdb' => $hero_ppdb
        ]);
    }


    public function update(Request $request, $id)
    {
        $hero = HeroPPDB::find($id);
        $hero->nama_pesantren = $request->nama_pesantren;
        $hero->judul = $request->judul;
        $hero->ta = $request->ta;
        $hero->link_btn = $request->link_btn;
        $oldImage = $hero->image;

        if ($request->file('image')) {
            $request->validate([
                'image' => 'image|mimes:png,jpg,jpeg|max:2048'
            ]);
            $file = $request->file('image');

            $filename = Str::uuid() . '.' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/hero'), $filename);
            $hero['image'] = $filename;

            if ($oldImage && $oldImage != 'default.jpg') {
                $oldImagePath = public_path('assets/img/hero/') . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }
        $hero->save();

        // Redirect
        return redirect()->route('admin-hero-ppdb.index')->with('success', 'Data Berhasil Disimpan');
    }
}
