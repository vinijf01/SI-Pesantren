<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HeroController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        $hero = Hero::first();

        return view('admin.hero.index', [
            'title' => 'Welcome Section',
            'active' => 'welcome_section',
            'hero' => $hero
        ]);
    }

    public function edit($id)
    {
        $hero = Hero::find($id);

        if (!$hero) {
            return redirect()->route('admin-hero.index')->with('error', 'Data Hero tidak ditemukan');
        }

        return view('admin.hero.edit', [
            'title' => 'Hero',
            'active' => 'welcome_section',
            'hero' => $hero
        ]);
    }


    public function update(Request $request, $id)
    {
        $hero = Hero::find($id);
        $hero->judul = $request->judul;
        $hero->isi = $request->isi;
        $hero->link_fb = $request->link_fb;
        $hero->link_ig = $request->link_ig;
        $hero->link_yt = $request->link_yt;
        $hero->link_btn = $request->link_btn;
        $hero->keterangan_tombol = $request->keterangan_tombol;
        $oldImage = $hero->image;

        if ($request->file('image')) {
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
        return redirect()->route('admin-hero.index')->with('success', 'Data Berhasil Disimpan');
    }
}
