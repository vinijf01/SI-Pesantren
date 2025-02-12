@extends('layouts.main_admin')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <h1>{{ $title }}</h1>
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
                    action="{{ route('admin-kata-pengantar.update', $kata_pengantar->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="1.30"
                                aria-describedby="helpId" value="{{ old('keterangan', $kata_pengantar->keterangan) }}"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="kata_pengantar" class="form-label">Kata Pengantar</label>
                            <textarea id="kata_pengantar" type="text" class="form-control tinymce-light tinymce-editor " name="kata_pengantar"
                                required>{{ $kata_pengantar->kata_pengantar }}</textarea><br>
                        </div>
                        <label for="foto" class="form-label">Profil</label>
                        <input type="file" id="foto" name="foto" class="form-control" aria-describedby="helpId">
                        <div>
                            <img id="showImage"
                                src="{{ !empty($kata_pengantar->foto) ? url('assets/img/teacher/' . $kata_pengantar->foto) : url('assets/img/teacher/1.jpg') }}"
                                alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                        </div><br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin-kata-pengantar.index') }}" class="btn btn-danger">Batal</a>
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
