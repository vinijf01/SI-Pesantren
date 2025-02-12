<?php

namespace App\Http\Controllers;

use App\Models\Hafalan;
use App\Models\Raport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrangtuaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::id();

        $id_santri = User::where('id', $id)->value('id_santri_fk');
        $nama = User::where('id', $id)->value('nama');

        $raport = Raport::with('user', 'user.santri.programAkademik')
            ->where('id_santri', $id_santri)
            ->orderByRaw('(select pa.nama_program from santri s join program_akademik pa on s.id_program = pa.id where s.id_santri = raports.id_santri) asc')
            ->orderByRaw('(select TA from santri where id_santri = raports.id_santri) asc')
            ->get();

        return view('parents.raport.index', [
            'title' => $nama,
            'active' => 'raport_santri',
            'raport_santri' => $raport
        ]);
    }


    public function edit($id_santri)
    {
        // $data = Raport::with('user', 'user.santri.programAkademik')->find($id_santri);
        $data = Raport::with('user', 'user.santri.programAkademik')
            ->where('id_santri', $id_santri)
            ->get();
        // dd($data);
        return view('admin.raport.detail', [
            'title' => 'Detail Raport Santri',
            'active' => 'raport_santri',
            'raport_santri' => $data
        ]);
    }

    public function create()
    {
        $id = Auth::id();

        $id_santri = User::where('id', $id)->value('id_santri_fk');
        $nama = User::where('id', $id)->value('nama');

        $Hafalan = Hafalan::with('user', 'user.santri.programAkademik')
            ->where('id_santri', $id_santri)
            ->get();

        return view('parents.hafalan.index', [
            'title' => $nama,
            'active' => 'hafalan_santri',
            'hafalan' => $Hafalan
        ]);
    }

    public function dashboardParent()
    {

        return view('parents.index', [
            'title' => 'Dashboard',
            'active' => 'parent',
        ]);
    }
}
