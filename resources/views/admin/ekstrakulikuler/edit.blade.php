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
                    action="{{ route('admin-ekstrakulikuler.update', $ekstrakulikuler->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="nama_ekstrakulikuler" class="form-label">Nama Program Ekstrakulier</label>
                            <input type="text" name="nama_ekstrakulikuler" class="form-control"
                                placeholder="Nama Program" aria-describedby="helpId" required="required"
                                value="{{ old('nama_ekstrakulikuler', $ekstrakulikuler->nama_ekstrakulikuler) }}" required>
                            @if ($errors->has('nama_ekstrakulikuler'))
                                <span class="text-danger text-left">{{ $errors->first('nama_ekstrakulikuler') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="waktu_per_minggu" class="form-label">Berapa kali / Minggu</label>
                            <select id="waktu_per_minggu" name="waktu_per_minggu" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jam_per_periode" class="form-label">Berapa jam / Periode</label>
                            <input type="text" id="jam_per_periode" name="jam_per_periode" class="form-control"
                                placeholder="1.30" aria-describedby="helpId"
                                value="{{ old('jam_per_periode', $ekstrakulikuler->jam_per_periode) }}" required>
                        </div>
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" id="image" name="image" class="form-control" aria-describedby="helpId">
                        <small id="helpId" class="form-text text-muted">Ukuran dimensi disarankan: 638 x 478s
                            piksel</small>
                        <div>
                            <img id="showImage"
                                src="{{ !empty($ekstrakulikuler->image) ? url('assets/img/ekstrakulikuler/' . $ekstrakulikuler->image) : url('assets/img/program/home-program-1.jpg') }}"
                                alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                        </div><br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin-ekstrakulikuler.index') }}" class="btn btn-danger">Batal</a>
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
