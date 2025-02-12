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
                <form class="needs-validation forms-sample" method="POST" action="{{ route('admin-hero.update', $hero->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" id="image" name="image" class="form-control"
                                aria-describedby="helpId">
                            <small id="helpId" class="form-text text-muted">Ukuran dimensi disarankan: 884 x 796
                                piksel</small>
                            <div>
                                <img id="showImage"
                                    src="{{ !empty($hero->image) ? url('assets/img/hero/' . $hero->image) : url('assets/img/hero/hero-1.png') }}"
                                    alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label">Pengantar</label>
                            <input type="text" id="judul" name="judul" class="form-control"
                                aria-describedby="helpId" value="{{ old('judul', $hero->judul) }}">

                        </div>
                        <div class="mb-3">
                            <label for="isi" class="form-label">Isi</label>
                            <input type="text" id="isi" name="isi" class="form-control"
                                aria-describedby="helpId" value="{{ old('isi', $hero->isi) }}">

                        </div>
                        <div class="mb-3">
                            <label for="keterangan_tombol" class="form-label">Ket.Tombol</label>
                            <input type="text" id="keterangan_tombol" name="keterangan_tombol" class="form-control"
                                aria-describedby="helpId" value="{{ old('keterangan_tombol', $hero->keterangan_tombol) }}">

                        </div>
                        <div class="mb-3">
                            <label for="link_btn" class="form-label">Link Tombol</label>
                            <input type="text" id="link_btn" name="link_btn" class="form-control"
                                aria-describedby="helpId" value="{{ old('link_btn', $hero->link_btn) }}">

                        </div>
                        <div class="mb-3">
                            <label for="link_fb" class="form-label">Link Facebook</label>
                            <input type="text" id="link_fb" name="link_fb" class="form-control"
                                aria-describedby="helpId" value="{{ old('link_fb', $hero->link_fb) }}">

                        </div>
                        <div class="mb-3">
                            <label for="link_ig" class="form-label">Link Instagram</label>
                            <input type="text" id="link_ig" name="link_ig" class="form-control"
                                aria-describedby="helpId" value="{{ old('link_ig', $hero->link_ig) }}">

                        </div>
                        <div class="mb-3">
                            <label for="link_yt" class="form-label">Link Youtube</label>
                            <input type="text" id="link_yt" name="link_yt" class="form-control"
                                aria-describedby="helpId" value="{{ old('link_yt', $hero->link_yt) }}">

                        </div>
                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin-hero.index') }}" class="btn btn-danger">Batal</a>
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
