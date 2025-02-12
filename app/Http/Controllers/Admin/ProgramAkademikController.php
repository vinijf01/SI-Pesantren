<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\ProgramAkademik;
use Illuminate\Http\Request;

class ProgramAkademikController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        return view('admin.program_akademik.index', [
            'title' => 'Program Akademik',
            'active' => 'program_akademik',
            'program_akademik' => ProgramAkademik::get()
        ]);
    }

    public function create()
    {
        return view('admin.program_akademik.create', [
            'title' => 'Program Akademik',
            'active' => 'program_akademik',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required',
            'deskripsi_singkat' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'spp' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->file('logo')) {
            $file = $request->file('logo');

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/img/logo/'), $filename);
            $logo = $filename;
        }

        ProgramAkademik::create([
            'nama_program' => $request->nama_program,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'deskripsi' => $request->deskripsi,
            'kategori' => $request->kategori,
            'logo' => $logo,
            'spp' => $request->spp,
        ]);

        return redirect()->route('admin-program-akademik.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = ProgramAkademik::find($id);
        return view('admin.program_akademik.edit', [
            'title' => 'Program Akademik',
            'active' => 'program_akademik',
            'program_akademik' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = ProgramAkademik::find($id);
        $data->nama_program = $request->nama_program;
        $data->deskripsi_singkat = $request->deskripsi_singkat;
        $data->deskripsi = $request->deskripsi;
        $data->kategori = $request->kategori;
        $data->spp = $request->spp;
        $oldlogo = $data->logo;

        if ($request->file('logo')) {
            $request->validate([
                'logo' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $file = $request->file('logo');

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('assets/img/logo/'), $filename);
            $data['logo'] = $filename;

            if ($oldlogo && $oldlogo != 'default.jpg') {
                $oldImagePath = public_path('assets/img/logo/') . $oldlogo;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }

        $request->validate([
            'nama_program' => 'required',
            'deskripsi_singkat' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'spp' => 'required',
        ]);

        $data->save();
        return redirect()->route('admin-program-akademik.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = ProgramAkademik::find($id);

        if ($data->logo) {
            $oldImagePath = public_path('assets/img/logo/') . $data->logo;
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
        $data->delete();
        return redirect()->route('admin-program-akademik.index')->with('success', 'Data Berhasil Dihapus');
    }
}
