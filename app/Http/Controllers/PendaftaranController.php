<?php

namespace App\Http\Controllers;

use App\Models\CalonSantri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PendaftaranController extends Controller
{
    public function store(Request $request)
    {
        // Validasi file
        $this->validate($request, [
            'kk' => 'file|mimes:pdf',
            'sk_sekolah' => 'file|mimes:pdf',
            'akta' => 'file|mimes:pdf',
            'ktp' => 'file|mimes:pdf',
            'raport' => 'file|mimes:pdf',
            'pasphoto' => 'file|mimes:png,jpeg,jpg',
            'bukti_pembayaran' => 'file|mimes:png,jpeg,jpg',
        ]);


        // Simpan file ke direktori storage/private
        $fileraport = $this->storeFile($request->file('raport'), 'raport');
        $filesk_sekolah = $this->storeFile($request->file('sk_sekolah'), 'sk_sekolah');
        $fileAkta = $this->storeFile($request->file('akta'), 'akta');
        $fileKK = $this->storeFile($request->file('kk'), 'KK');
        $fileKTP = $this->storeFile($request->file('ktp'), 'KTP');
        $image = $this->storeFile($request->file('pasphoto'), 'pasphoto');
        $bukti_pembayaran = $this->storeFile($request->file('bukti_pembayaran'), 'bukti_pembayaran');

        $calonSantri = CalonSantri::create([
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia' => $request->usia,
            'id_program' => $request->id_program,
            'no_wa' => $request->no_wa,
            'pasphoto' => $image,
            'raport' => $fileraport,
            'sk_sekolah' => $filesk_sekolah,
            'akta' => $fileAkta,
            'kk' => $fileKK,
            'ktp' => $fileKTP,
            'bukti_pembayaran' => $bukti_pembayaran,
        ]);

        if ($calonSantri) {
            // Redirect to PPDB page on success
            return redirect()->route('ppdb')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            // Redirect back to the form with a warning message on failure
            return redirect()->back()->with('warning', 'Gagal menambahkan data. Silakan coba lagi.');
        }
    }

    // Fungsi untuk menyimpan file ke direktori storage/public
    private function storeFile($file, $folder)
    {
        if ($file) {
            $filename = Str::uuid() . '.' . $file->getClientOriginalName();
            $path = $file->storeAs('public/' . $folder, $filename);

            return $filename;
        }

        return null;
    }
}
