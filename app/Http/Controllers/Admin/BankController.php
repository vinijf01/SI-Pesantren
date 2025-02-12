<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        $bank = Bank::latest()->first();

        return view('admin.bank.index', [
            'title' => 'PPDB',
            'active' => 'bank',
            'bank' => $bank
        ]);
    }


    public function edit($id)
    {
        $data = Bank::find($id);
        return view('admin.bank.edit', [
            'title' => 'Data Bank',
            'active' => 'bank',
            'bank' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Bank::find($id);
        $data->update($request->all());
        return redirect()->route('admin-ppdb-bank.index')->with('success', 'Data Berhasil Disimpan');
    }
}
