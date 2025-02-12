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
                    action="{{ route('admin-foto-kegiatan-program.update', $foto_program_akademik->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="id_program" class="form-label">Program Akademik</label>
                            <select id="id_program" name="id_program" class="form-control" required>
                                <option value="">Pilih Program Akademik</option>
                                @foreach ($program as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $foto_program_akademik->id_program ? 'selected' : '' }}>
                                        {{ $item->nama_program }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" id="keterangan" name="keterangan" class="form-control"
                                aria-describedby="helpId"
                                value="{{ old('keterangan', $foto_program_akademik->keterangan) }}" required>
                        </div>
                        <label for="foto" class="form-label">Gambar</label>
                        <input type="file" id="foto" name="foto" class="form-control" aria-describedby="helpId">
                        <div>
                            <img id="showImage"
                                src="{{ !empty($foto_program_akademik->foto) ? url('assets/img/program/' . $foto_program_akademik->foto) : url('assets/img/program/home-program-1.jpg') }}"
                                alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                        </div><br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin-foto-kegiatan-program.index') }}" class="btn btn-danger">Batal</a>
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
