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
                    action="{{ route('admin-ppdb-cara-pendaftaran.update', $cara_pendaftaran->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="step" class="form-label">Step</label>
                            <input type="text" name="step" class="form-control" placeholder="Step 1 / Langkah 1"
                                aria-describedby="helpId" required="required"
                                value="{{ old('step', $cara_pendaftaran->step) }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama_step" class="form-label">Nama Step</label>
                            <input type="text" name="nama_step" class="form-control" aria-describedby="helpId"
                                value="{{ old('nama_step', $cara_pendaftaran->nama_step) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="logo" class="form-label">Icon</label>
                            <select name="logo" class="form-control">
                                <option value="flaticon-user-1"
                                    {{ $cara_pendaftaran->logo == 'flaticon-user-1' ? 'selected' : '' }}>Icon 1</option>
                                <option value="flaticon-reading"
                                    {{ $cara_pendaftaran->logo == 'flaticon-reading' ? 'selected' : '' }}>Icon 2</option>
                                <option value="flaticon-upload"
                                    {{ $cara_pendaftaran->logo == 'flaticon-upload' ? 'selected' : '' }}>Icon 3</option>
                                <option value="flaticon-round-table"
                                    {{ $cara_pendaftaran->logo == 'flaticon-round-table' ? 'selected' : '' }}>Icon 4
                                </option>
                                <option value="flaticon-clock-2"
                                    {{ $cara_pendaftaran->logo == 'flaticon-clock-2' ? 'selected' : '' }}>Icon 5</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea id="deskripsi" type="text" class="form-control tinymce-light tinymce-editor " name="deskripsi">{{ $cara_pendaftaran->deskripsi }}</textarea><br>
                        </div>
                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin-ppdb-cara-pendaftaran.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
