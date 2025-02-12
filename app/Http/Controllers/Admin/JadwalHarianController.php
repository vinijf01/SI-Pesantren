<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalKegiatanProgram;
use App\Models\ProgramAkademik;
use Illuminate\Http\Request;

class JadwalHarianController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        $jadwal_harian = JadwalKegiatanProgram::with('program')
            ->orderBy('id_program')
            ->orderBy('jam')
            ->get();

        return view('admin.jadwal_harian.index', [
            'title' => 'Jadwal Kegiatan Harian',
            'active' => 'jadwal_harian',
            'jadwal_harian' => $jadwal_harian
        ]);
    }

    public function create()
    {
        $program = ProgramAkademik::all();

        return view('admin.jadwal_harian.create', [
            'title' => 'Jadwal Kegiatan Harian',
            'active' => 'jadwal_harian',
            'program' => $program,

        ]);
    }

    public function store(Request $request)
    {

        JadwalKegiatanProgram::create($request->all());

        return redirect()->route('admin-jadwal-harian.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = JadwalKegiatanProgram::find($id);
        $program = ProgramAkademik::all();

        return view('admin.jadwal_harian.edit', [
            'title' => 'Jadwal Kegiatan Harian',
            'active' => 'jadwal_harian',
            'jadwal_harian' => $data,
            'program' => $program,

        ]);
    }

    public function update(Request $request, $id)
    {
        $data = JadwalKegiatanProgram::find($id);
        $data->update($request->all());
        return redirect()->route('admin-jadwal-harian.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = JadwalKegiatanProgram::find($id);
        $data->delete();
        return redirect()->route('admin-jadwal-harian.index')->with('success', 'Data Berhasil Dihapus');
    }
}
