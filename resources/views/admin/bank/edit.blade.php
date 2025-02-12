@extends('layouts.main_admin')
@section('content')
    <h1>Edit {{ $title }}</h1>
    <div class="card mb-5">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8">
                    <h5>{{ $title }}</h5>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <div class="row">
                <form class="needs-validation forms-sample" method="POST"
                    action="{{ route('admin-ppdb-bank.update', $bank->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="nama_bank" class="form-label">Nama Bank</label>
                            <input type="text" name="nama_bank" class="form-control" aria-describedby="helpId"
                                value="{{ old('nama_bank', $bank->nama_bank) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_rekening" class="form-label">Nama Rekening</label>
                            <input type="text" name="nama_rekening" class="form-control" aria-describedby="helpId"
                                value="{{ old('nama_rekening', $bank->nama_rekening) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_rekening" class="form-label">Nama Rekening</label>
                            <input type="text" name="nomor_rekening" class="form-control" aria-describedby="helpId"
                                value="{{ old('nomor_rekening', $bank->nomor_rekening) }}" required>
                        </div>
                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin-ppdb-bank.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
