<?php

namespace App\Http\Controllers;

use App\Models\Peminat;
use Illuminate\Http\Request;

class PraPendaftaranController extends Controller
{
    public function store(Request $request)
    {
        Peminat::create($request->all());

        return redirect()->route('ppdb')->with('success', 'Data Berhasil Ditambahkan');
    }
}
