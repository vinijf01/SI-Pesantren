<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Schema;

class SantriController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        $santri = Santri::with('programAkademik')
            ->orderBy('TA', 'asc')
            ->orderBy('id_program', 'asc')
            ->orderBy('jenis_kelamin')
            ->get();

        return view('admin.santri.index', [
            'title' => 'Data Santri',
            'active' => 'data_santri',
            'santri' => $santri
        ]);
    }


    public function edit($id)
    {
        $data = Santri::find($id);
        return view('admin.santri.edit', [
            'title' => 'Data Santri',
            'active' => 'data_santri',
            'data_santri' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Santri::find($id);

        // Validasi file
        $this->validate($request, [
            'kk' => 'file|mimes:pdf',
            'sk_sekolah' => 'file|mimes:pdf',
            'akta' => 'file|mimes:pdf',
            'ktp' => 'file|mimes:pdf',
            'raport' => 'file|mimes:pdf',
            'pasphoto' => 'file|mimes:png,jpeg,jpg'
        ]);

        $fileraport = $data->raport;
        $filesk_sekolah = $data->sk_sekolah;
        $fileAkta = $data->akta;
        $fileKK = $data->kk;
        $fileKTP = $data->ktp;
        $Filepasphoto = $data->pasphoto;

        if ($request->hasFile('raport')) {
            $this->deleteFileIfExists($data->raport, 'raport');
            $fileraport = $this->storeFile($request->file('raport'), 'raport');
        }

        if ($request->hasFile('sk_sekolah')) {
            $this->deleteFileIfExists($data->sk_sekolah, 'sk_sekolah');
            $filesk_sekolah = $this->storeFile($request->file('sk_sekolah'), 'sk_sekolah');
        }

        if ($request->hasFile('akta')) {
            $this->deleteFileIfExists($data->akta, 'akta');
            $fileAkta = $this->storeFile($request->file('akta'), 'akta');
        }

        if ($request->hasFile('kk')) {
            $this->deleteFileIfExists($data->kk, 'KK');
            $fileKK = $this->storeFile($request->file('kk'), 'KK');
        }

        if ($request->hasFile('ktp')) {
            $this->deleteFileIfExists($data->ktp, 'KTP');
            $fileKTP = $this->storeFile($request->file('ktp'), 'KTP');
        }

        if ($request->hasFile('pasphoto')) {
            $this->deleteFileIfExists($data->pasphoto, 'pasphoto');
            $Filepasphoto = $this->storeFile($request->file('pasphoto'), 'pasphoto');
        }
        // Simpan data lainnya
        $data->update([
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'id_program' => $request->id_program,
            'no_wa' => $request->no_wa,
            'pasphoto' => $Filepasphoto,
            'raport' => $fileraport,
            'sk_sekolah' => $filesk_sekolah,
            'akta' => $fileAkta,
            'kk' => $fileKK,
            'ktp' => $fileKTP,
            'status' => $request->status,
            'TA' => $request->TA
        ]);

        // Jika status menjadi 'Lolos', pindahkan data ke tabel Users
        if ($request->status == 'Lolos') {
            User::create([
                'password' => $data->password,
                'nama' => $data->nama_lengkap,
                'id_santri_fk' => $data->id_santri,
            ]);
        }
        return redirect()->route('admin-data-santri.index')->with('success', 'Data Berhasil Disimpan');
    }

    private function storeFile($file, $folder)
    {
        if ($file) {
            $filename = Str::uuid() . '.' . $file->getClientOriginalName();
            $path = $file->storeAs('public/' . $folder, $filename);

            return $filename;
        }

        return null;
    }


    private function deleteFileIfExists($filename, $directory)
    {
        $filepath = $directory . '/' . $filename;
        if (Storage::disk('public')->exists($filepath)) {
            Storage::disk('public')->delete($filepath);
        }
    }

    public function detail($id)
    {
        $data = Santri::find($id);
        return view('admin.santri.detail', [
            'title' => 'Detail Data Santri',
            'active' => 'data_santri',
            'data_santri' => $data
        ]);
    }

    public function destroy($id)
    {
        $data = Santri::find($id);

        $this->deleteFileIfExists($data->sk_sekolah, 'sk_sekolah');
        $this->deleteFileIfExists($data->akta, 'akta');
        $this->deleteFileIfExists($data->kk, 'KK');
        $this->deleteFileIfExists($data->ktp, 'KTP');
        $this->deleteFileIfExists($data->pasphoto, 'pasphoto');
        $this->deleteFileIfExists($data->raport, 'raport');
        $data->delete();

        return redirect()->route('admin-data-santri.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function raport_wustho()
    {
        $santri = Santri::where('id_program', 1)->get();

        return view('admin.santri.raport_wustho', [
            'santri' => $santri,
        ]);
    }

    public function raport_ulya()
    {
        $santri = Santri::where('id_program', 2)->get();

        return view('admin.santri.raport_ulya', [
            'santri' => $santri,
        ]);
    }

    public function raport_takhosus()
    {
        $santri = Santri::where('id_program', 3)->get();

        return view('admin.santri.raport_takhosus', [
            'santri' => $santri,
        ]);
    }

    public function raport_idad()
    {
        $santri = Santri::where('id_program', 4)->get();

        return view('admin.santri.raport_idad', [
            'santri' => $santri,
        ]);
    }
}
