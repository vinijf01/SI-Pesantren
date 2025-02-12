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
                <form class="needs-validation forms-sample" method="POST" action="{{ route('admin-image-fasilitas.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="id_fasilitas" class="form-label">Nama Fasilitas</label>
                            <select class="form-select" id="id_fasilitas" name="id_fasilitas" aria-describedby="helpId"
                                required>
                                <option value="">Pilih Nama Fasilitas</option>
                                @foreach ($id_fasilitas as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" id="image" name="image" class="form-control" aria-describedby="helpId"
                            required>
                        <div>
                            <img id="showImage" src="{{ url('assets/img/program/home-program-1.jpg') }}" alt="Current Image"
                                style="max-width: 100px; margin-top: 10px;">
                        </div><br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin-image-fasilitas.index') }}" class="btn btn-danger">Batal</a>
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
