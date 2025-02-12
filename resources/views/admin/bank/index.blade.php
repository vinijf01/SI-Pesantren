@extends('layouts.main_admin')
@section('content')
    <h1>{{ $title }}</h1>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8">
                    <h5>{{ $title }}</h5>
                </div>
                @include('partials.messages')
            </div>
        </div>
        <div class="table-responsive text-nowrap p-3">
            <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th>Nama Bank</th>
                        <th>Nama Rekening</th>
                        <th>Nomor Rekening</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>{{ $bank->nama_bank }}</td>
                        <td>{{ $bank->nama_rekening }}</td>
                        <td>{{ $bank->nomor_rekening }}</td>
                        <td>
                            <a href="{{ route('admin-ppdb-bank.edit', $bank->id) }}">
                                <i class='bx bx-edit crud-icon' style="font-size: 1.5em; color:green;" title="Edit"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
