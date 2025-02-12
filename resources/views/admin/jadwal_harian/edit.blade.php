@extends('layouts.main_admin')
@section('content')
    <h1>Edit Harian</h1>
    <div class="card mb-5">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Edit Jadwal Harian</h5>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <div class="row">
                <form class="needs-validation forms-sample" method="POST"
                    action="{{ route('admin-jadwal-harian.update', $jadwal_harian->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <div class="mb-3">
                                <label for="id_program" class="form-label">Nama Program</label>
                                <select id="id_program" name="id_program" class="form-control" required>
                                    <option value="">Pilih Program Akademik</option>
                                    @foreach ($program as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $item->id == $jadwal_harian->id_program ? 'selected' : '' }}>
                                            {{ $item->nama_program }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jam" class="form-label">Jam</label>
                                <input type="text" name="jam" class="form-control" aria-describedby="helpId"
                                    value="{{ old('jam', $jadwal_harian->jam) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="kegiatan" class="form-label">Kegiatan</label>
                                <input type="text" name="kegiatan" class="form-control" aria-describedby="helpId"
                                    value="{{ old('kegiatan', $jadwal_harian->kegiatan) }}" required>
                            </div>
                            <div class="mb-5">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('admin-jadwal-harian.index') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
