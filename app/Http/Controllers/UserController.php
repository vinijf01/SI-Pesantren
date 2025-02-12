<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Berita;
use App\Models\BiayaPendidikan;
use App\Models\CalonSantri;
use App\Models\CaraPendaftaran;
use App\Models\Ekstrakulikuler;
use App\Models\Faq;
use App\Models\Fasilitas;
use App\Models\Galeri;
use App\Models\Hero;
use App\Models\HeroPPDB;
use App\Models\ImageFasilitas;
use App\Models\KataPengantar;
use App\Models\Kuantitatif;
use App\Models\ProgramAkademik;
use App\Models\SyaratPPDB;
use App\Models\TentangPesantren;
use App\Models\Testimoni;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    public function beranda()
    {
        $heroData = Hero::latest()->first();
        $tentang_pesantren = TentangPesantren::latest()->first();
        $program_akademik = ProgramAkademik::all();
        $data_kuantitatif = Kuantitatif::all();
        $ekstrakulikuler = Ekstrakulikuler::all();
        $faq = Faq::all();
        $testimoni = Testimoni::all();
        $berita = Berita::all();
        $galeri = Galeri::all();


        return view('welcome', [
            'heroData' => $heroData,
            'tentang_pesantren' => $tentang_pesantren,
            'program_akademik' => $program_akademik,
            'data_kuantitatif' => $data_kuantitatif,
            'ekstrakulikuler' => $ekstrakulikuler,
            'faq' => $faq,
            'testimoni' => $testimoni,
            'berita' => $berita,
            'galeri' => $galeri,

        ]);
    }

    //Visi Misi
    public function visi_misi()
    {
        $visi_misi = VisiMisi::latest()->first();
        return view('visi_misi', [
            'visi_misi' => $visi_misi,
        ]);
    }


    public function yayasan()
    {
        $kata_pengantar = KataPengantar::where('id', 1)->first();
        return view('yayasan', [
            'kata_pengantar' => $kata_pengantar,
        ]);
    }

    public function sekolah()
    {
        $kata_pengantar = KataPengantar::where('id', 2)->first();
        return view('sekolah', [
            'kata_pengantar' => $kata_pengantar,
        ]);
    }

    public function program_akademik($id)
    {
        $detail = DB::table('program_akademik')
            ->where('id', $id)
            ->first(); // Menggunakan first() karena kita hanya ingin satu record

        if (!$detail) {
            abort(404); // Tambahkan handling jika program_akademik dengan id tersebut tidak ditemukan
        }

        $fotoKegiatan = DB::table('foto_kegiatan_program')
            ->where('id_program', $id)
            ->get();

        $ket_class = DB::table('ket_class')
            ->where('id_program', $id)
            ->first();
        // dd($ket_class);
        $all_program = ProgramAkademik::all();

        $jadwal_harian = DB::table('jadwal_kegiatan_program')
            ->where('id_program', $id)
            ->orderBy('jam')
            ->get();

        $ketua_program = DB::table('ketua_program')
            ->where('id_program', $id)
            ->first();

        return view('program_akademik.detail', [
            'program_akademik' => $detail,
            'foto_kegiatan' => $fotoKegiatan,
            'all_program' => $all_program,
            'ket_class' => $ket_class,
            'jadwal_harian' => $jadwal_harian,
            'ketua_program' => $ketua_program
        ]);
    }

    public function ppdb()
    {
        $heroData = HeroPPDB::latest()->first();
        $syarat = SyaratPPDB::all();
        $bank = Bank::latest()->first();
        $cara_pendaftaran = CaraPendaftaran::all();
        $biaya_pendidikan = BiayaPendidikan::all();


        return view('ppdb.ppdb', [
            'heroData' => $heroData,
            'syarat' => $syarat,
            'bank' => $bank,
            'cara_pendaftaran' => $cara_pendaftaran,
            'biaya_pendidikan' => $biaya_pendidikan,

        ]);
    }

    public function formulir_prapendaftaran()
    {

        return view('ppdb.formulir_pra');
    }

    public function formulir_pendaftaran()
    {

        return view('ppdb.formulir_pendaftaran');
    }

    public function pengembangan()
    {

        return view('pengembangan');
    }

    public function berita()
    {
        $berita = Berita::latest()->paginate(3);
        $beritaTerbaru = Berita::latest()->take(3)->get();

        return view('berita.index', [
            'berita' => $berita,
            'beritaTerbaru' => $beritaTerbaru,

        ]);
    }

    public function detail_berita($id)
    {
        $berita_detail = DB::table('berita')
            ->where('id', $id)
            ->first();
        $berita = Berita::all();
        return view('berita.detail', [
            'berita_detail' => $berita_detail,
            'berita' => $berita,

        ]);
    }

    public function search(Request $request)
    {
        $beritaTerbaru = Berita::latest()->take(3)->get();

        $query = $request->input('q');

        $berita = Berita::where('judul', 'like', '%' . $query . '%')->paginate(10);

        if ($berita->isEmpty()) {
            return view('berita.search-empty');
        }

        return view('berita.index', [
            'beritaTerbaru' => $beritaTerbaru,
            'berita' => $berita
        ]);
    }

    public function fasilitas()
    {
        $fasilitas = Fasilitas::with('images')->get();

        return view('fasilitas', [
            'fasilitas' => $fasilitas,
        ]);
    }

    public function galeri()
    {
        $heroData = HeroPPDB::latest()->first();
        $galeri = Galeri::all();
        return view('galeri.index', [
            'galeri' => $galeri,
            'heroData' => $heroData,
        ]);
    }

    public function kontak()
    {
        $heroData = HeroPPDB::latest()->first();
        return view('kontak', [
            'heroData' => $heroData,
        ]);
    }
}
