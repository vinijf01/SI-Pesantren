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
                    action="{{ route('admin-ppdb-peminat.update', $peminat->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" aria-describedby="helpId"
                                required="required" value="{{ old('nama_lengkap', $peminat->nama_lengkap) }}">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" {{ 'Laki-laki' == $peminat->jenis_kelamin ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan" {{ 'Perempuan' == $peminat->jenis_kelamin ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_program" class="form-label">Program Akademik</label>
                            <select id="id_program" name="id_program" class="form-control" required>
                                <option value="">Pilih Program Akademik</option>
                                @foreach ($program as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $peminat->id_program ? 'selected' : '' }}>
                                        {{ $item->nama_program }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="no_wa" class="form-label">Nomor Whatsapp</label>
                            <input type="text" name="no_wa" class="form-control" aria-describedby="helpId"
                                required="required" value="{{ old('no_wa', $peminat->no_wa) }}">
                        </div>
                        <div class="mb-3">
                            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                            <input type="text" name="tahun_ajaran" class="form-control" aria-describedby="helpId"
                                required="required" value="{{ old('tahun_ajaran', $peminat->tahun_ajaran) }}">
                        </div>
                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin-ppdb-peminat.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
