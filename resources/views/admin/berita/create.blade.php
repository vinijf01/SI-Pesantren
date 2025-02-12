@extends('layouts.main_admin')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                <form class="needs-validation forms-sample" method="POST" action="{{ route('admin-berita.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" placeholder="Judul Berita"
                                aria-describedby="helpId" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" id="penulis" name="penulis" class="form-control"
                                aria-describedby="helpId" required>
                        </div>
                        <div class="mb-3">
                            <label for="isi" class="form-label">Konten</label>
                            <textarea id="isi" type="text" class="form-control tinymce-light tinymce-editor " name="isi"></textarea><br>
                        </div>
                        <label for="foto" class="form-label">Gambar</label>
                        <input type="file" id="foto" name="foto" class="form-control" aria-describedby="helpId"
                            required>
                        <div>
                            <img id="showImage" src="{{ url('assets/img/blog/1.jpg') }}" alt="Current Image"
                                style="max-width: 100px; margin-top: 10px;">
                        </div><br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin-berita.index') }}" class="btn btn-danger">Batal</a>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#foto').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
