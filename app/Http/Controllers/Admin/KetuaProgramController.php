<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KetuaProgram;
use App\Models\ProgramAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class KetuaProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        $ketua_program = KetuaProgram::with('program')->get();

        return view('admin.ketua_program.index', [
            'title' => 'Ketua Program Akademik',
            'active' => 'ketua_program',
            'ketua_program' => $ketua_program
        ]);
    }

    public function create()
    {
        $program = ProgramAkademik::all();

        return view('admin.ketua_program.create', [
            'title' => 'Ketua Program Akademik',
            'active' => 'ketua_program',
            'program' => $program,

        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'profil' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->file('profil')) {
            $file = $request->file('profil');

            $filename = Str::uuid() . '.' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/ketua_program/'), $filename);
            $image = $filename;
        }
        KetuaProgram::create([
            'id_program' => $request->id_program,
            'nama' => $request->nama,
            'profil' => $image
        ]);


        return redirect()->route('admin-ketua-program.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $program = ProgramAkademik::all();

        $data = KetuaProgram::find($id);
        if (!$data) {
            return redirect()->route('admin-ketua-program.index')->with('error', 'Data tidak ditemukan');
        }
        return view('admin.ketua_program.edit', [
            'title' => 'Ketua Program Akademik',
            'active' => 'ketua_program',
            'ketua_program' => $data,
            'program' => $program,

        ]);
    }

    public function update(Request $request, $id)
    {
        $data = KetuaProgram::find($id);
        $data->id_program = $request->id_program;
        $data->nama = $request->nama;
        $oldImage = $data->profil;

        if ($request->file('profil')) {
            $request->validate([
                'profil' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $file = $request->file('profil');

            $filename = Str::uuid() . '.' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/ketua_program/'), $filename);
            $data['profil'] = $filename;

            if ($oldImage) {
                $oldImagePath = public_path('assets/img/ketua_program/') . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        $data->save();
        return redirect()->route('admin-ketua-program.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = KetuaProgram::find($id);
        $image = $data->profil;
        if ($image) {
            $imagePath = public_path('assets/img/ketua_program/') . $image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $data->delete();
        return redirect()->route('admin-ketua-program.index')->with('success', 'Data Berhasil Dihapus');
    }
}
