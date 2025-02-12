@extends('layouts.main_admin')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <h1>Edit {{ $title }}</h1>
    <div class="card mb-5">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Edit Data Pesantren</h5>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <div class="row">
                <form class="needs-validation forms-sample" method="POST"
                    action="{{ route('admin-tentang-pesantren.update', $tentang_pesantren->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="foto" class="form-label">Gambar</label>
                            <input type="file" id="foto" name="foto" class="form-control"
                                aria-describedby="helpId">
                            <small id="helpId" class="form-text text-muted">Ukuran dimensi disarankan: 636 x 465
                                piksel</small>
                            <div>
                                <img id="showImage"
                                    src="{{ !empty($tentang_pesantren->foto) ? url('assets/img/promotion/' . $tentang_pesantren->foto) : url('assets/img/promotion/default.png') }}"
                                    alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Nama Pesantren</label>
                            <input type="text" id="judul" name="judul" class="form-control"
                                aria-describedby="helpId" value="{{ old('judul', $tentang_pesantren->judul) }}">

                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" id="deskripsi" name="deskripsi" class="form-control"
                                aria-describedby="helpId" value="{{ old('deskripsi', $tentang_pesantren->deskripsi) }}">

                        </div>
                        <div class="mb-3">
                            <label for="keterangan_video" class="form-label">Keterangan Video</label>
                            <input type="text" id="keterangan_video" name="keterangan_video" class="form-control"
                                aria-describedby="helpId"
                                value="{{ old('keterangan_video', $tentang_pesantren->keterangan_video) }}">

                        </div>
                        <div class="mb-3">
                            <label for="link_btn" class="form-label">Link Video</label>
                            <input type="text" id="link_btn" name="link_btn" class="form-control"
                                aria-describedby="helpId" value="{{ old('link_video', $tentang_pesantren->link_video) }}">

                        </div>
                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin-tentang-pesantren.index') }}" class="btn btn-danger">Batal</a>
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
