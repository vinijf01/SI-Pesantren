@extends('layouts.main_admin')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <h1>Edit {{ $title }}</h1>
    <div class="card mb-5">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Edit Data Hero</h5>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <div class="row">
                <form class="needs-validation forms-sample" method="POST"
                    action="{{ route('admin-hero-ppdb.update', $hero_ppdb->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" id="image" name="image" class="form-control"
                                aria-describedby="helpId">
                            <div>
                                <img id="showImage"
                                    src="{{ !empty($hero_ppdb->image) ? url('assets/img/hero/' . $hero_ppdb->image) : url('assets/img/hero/hero-1.png') }}"
                                    alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="nama_pesantren" class="form-label">Nama Pesantren</label>
                            <input type="text" name="nama_pesantren" class="form-control" aria-describedby="helpId"
                                value="{{ old('nama_pesantren', $hero_ppdb->nama_pesantren) }}" required>

                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Isi</label>
                            <input type="text" name="judul" class="form-control" aria-describedby="helpId"
                                value="{{ old('judul', $hero_ppdb->judul) }}" required>

                        </div>
                        <div class="mb-3">
                            <label for="ta" class="form-label">Tahun Ajaran</label>
                            <input type="text" name="ta" class="form-control" aria-describedby="helpId"
                                value="{{ old('ta', $hero_ppdb->ta) }}" required>

                        </div>
                        <div class="mb-3">
                            <label for="link_btn" class="form-label">Link Tombol</label>
                            <select id="link_btn" name="link_btn" class="form-control" required>
                                <option value="">Pilih Link Pendaftaran</option>
                                <option value="formulir_prapendaftaran"
                                    {{ $hero_ppdb->link_btn == 'formulir_prapendaftaran' ? 'selected' : '' }}>Formulir Pra
                                    Pendaftaran
                                </option>
                                <option value="formulir_pendaftaran"
                                    {{ $hero_ppdb->link_btn == 'formulir_pendaftaran' ? 'selected' : '' }}>Formulir Pasca
                                    Pendaftaran</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin-hero-ppdb.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
