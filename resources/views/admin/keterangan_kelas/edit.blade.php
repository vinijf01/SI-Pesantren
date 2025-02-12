@extends('layouts.main_admin')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <h1>Edit {{ $title }}</h1>
    <div class="card mb-5">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Edit {{ $title }}</h5>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <div class="row">
                <form class="needs-validation forms-sample" method="POST"
                    action="{{ route('admin-keterangan-kelas.update', $keterangan_kelas->id) }}"
                    enctype="multipart/form-data">
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
                                    src="{{ !empty($keterangan_kelas->image) ? url('assets/img/program/' . $keterangan_kelas->image) : url('assets/img/program/details-2.jpg') }}"
                                    alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="judul_1" class="form-label">Judul 1</label>
                            <input type="text" id="judul_1" name="judul_1" class="form-control"
                                aria-describedby="helpId" value="{{ old('judul_1', $keterangan_kelas->judul_1) }}" required>

                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_judul_1" class="form-label">Deskripsi Judul 1</label>
                            <textarea type="text" class="form-control tinymce-light tinymce-editor " name="deskripsi_judul_1">{{ $keterangan_kelas->deskripsi_judul_1 }}</textarea><br>
                        </div>
                        <div class="mb-3">
                            <label for="judul_2" class="form-label">Judul 2</label>
                            <input type="text" id="judul_2" name="judul_2" class="form-control"
                                aria-describedby="helpId" value="{{ old('judul_2', $keterangan_kelas->judul_2) }}" required>

                        </div>
                        <div class="mb-3">
                            <label for="deskripsi_judul_2" class="form-label">Deskripsi Judul 2</label>
                            <textarea name="deskripsi_judul_2" type="text" class="form-control tinymce-light tinymce-editor ">{{ $keterangan_kelas->deskripsi_judul_2 }}</textarea><br>
                        </div>
                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin-keterangan-kelas.index') }}" class="btn btn-danger">Batal</a>
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
