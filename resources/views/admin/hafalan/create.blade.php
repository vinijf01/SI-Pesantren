@extends('layouts.main_admin')
@section('content')
    <h1>Tambah {{ $title }}</h1>
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
                <form class="needs-validation forms-sample" method="POST" action="{{ route('admin-hafalan-santri.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @include('partials.messages')
                    <div class="col-lg-6 offset-2 col-md-4">
                        <div class="mb-3">
                            <label for="id_santri" class="form-label">Nama Santri</label>
                            <select class="form-select" id="id_santri" name="id_santri" aria-describedby="helpId">
                                <option value="">Pilih Nama Santri</option>
                                @foreach ($santri as $user)
                                    <option value="{{ $user->id_santri_fk }}">{{ $user->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control"
                                aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="surat" class="form-label">Surat</label>
                            <input type="text" id="surat" name="surat" class="form-control"
                                aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="ayat" class="form-label">Ayat</label>
                            <input type="text" id="ayat" name="ayat" class="form-control"
                                aria-describedby="helpId">
                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="text" id="total" name="total_hafalan" class="form-control"
                                aria-describedby="helpId">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin-hafalan-santri.index') }}" class="btn btn-danger">Batal</a>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
