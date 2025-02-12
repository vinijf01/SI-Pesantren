<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FotoKegiatanProgram;
use App\Models\ProgramAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FotoProgramAkademikController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        return view('admin.foto_program_akademik.index', [
            'title' => 'Foto Kegiatan Program Akademik',
            'active' => 'foto_program_akademik',
            'foto_program_akademik' => FotoKegiatanProgram::with('program')->get()
        ]);
    }

    public function create()
    {
        $program = ProgramAkademik::all();

        return view('admin.foto_program_akademik.create', [
            'title' => 'Foto Kegiatan Program Akademik',
            'active' => 'foto_program_akademik',
            'program' => $program,
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
            $file->move(public_path('assets/img/program'), $filename);
            $image = $filename;
        }
        FotoKegiatanProgram::create([
            'id_program' => $request->id_program,
            'keterangan' => $request->keterangan,
            'foto' => $image
        ]);
        return redirect()->route('admin-foto-kegiatan-program.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = FotoKegiatanProgram::find($id);
        $program = ProgramAkademik::all();

        return view('admin.foto_program_akademik.edit', [
            'title' => 'Foto Kegiatan Program',
            'active' => 'foto_program_akademik',
            'foto_program_akademik' => $data,
            'program' => $program,

        ]);
    }

    public function update(Request $request, $id)
    {
        $data = FotoKegiatanProgram::find($id);
        $data->id_program = $request->id_program;
        $data->keterangan = $request->keterangan;
        $oldImage = $data->foto;

        if ($request->file('foto')) {
            $request->validate([
                'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $file = $request->file('foto');

            $filename = Str::uuid() . '.' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/program/'), $filename);
            $data['foto'] = $filename;

            if ($oldImage) {
                $oldImagePath = public_path('assets/img/program/') . $oldImage;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        $data->save();
        return redirect()->route('admin-foto-kegiatan-program.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = FotoKegiatanProgram::find($id);
        $image = $data->foto;
        if ($image) {
            $imagePath = public_path('assets/img/program/') . $image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $data->delete();
        return redirect()->route('admin-foto-kegiatan-program.index')->with('success', 'Data Berhasil Dihapus');
    }
}
