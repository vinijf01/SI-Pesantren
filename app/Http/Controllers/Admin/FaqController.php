<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function index()
    {
        $faq = Faq::get();

        return view('admin.faq.index', [
            'title' => 'Pertanyaan Yang Sering Ditanyakan',
            'active' => 'faq',
            'faq' => $faq,
        ]);
    }

    public function create()
    {
        return view('admin.faq.create', [
            'title' => 'Pertanyaan Yang Sering Ditanyakan',
            'active' => 'faq',
        ]);
    }

    public function store(Request $request)
    {

        Faq::create($request->all());

        return redirect()->route('admin-faq.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = Faq::find($id);
        return view('admin.faq.edit', [
            'title' => 'Pertanyaan Yang Sering Ditanyakan',
            'active' => 'faq',
            'faq' => $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Faq::find($id);
        $data->update($request->all());
        return redirect()->route('admin-faq.index')->with('success', 'Data Berhasil Disimpan');
    }

    public function destroy($id)
    {
        $data = Faq::find($id);
        $data->delete();
        return redirect()->route('admin-faq.index')->with('success', 'Data Berhasil Dihapus');
    }
}
