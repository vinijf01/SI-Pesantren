@extends('layouts.main_admin')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                    action="{{ route('admin-raport-santri.update', $raport_santri[0]->id_santri) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        {{-- Tampilkan data santri hanya satu kali --}}
                        @if (count($raport_santri) > 0)
                            <div class="mb-3 row">
                                <label for="nama_lengkap" class="col-4 form-label">PasPhoto</label>
                                <div class="col-8">
                                    <div class="col-auto">
                                        <img id="showImage"
                                            src="{{ !empty($raport_santri[0]->user->santri->pasphoto) ? Storage::url('public/pasphoto/' . $raport_santri[0]->user->santri->pasphoto) : url('assets/img/promotion/default.png') }}"
                                            alt="Current Image" style="max-width: 150px;">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="id_santri" class="col-4 form-label">ID Santri</label>
                                <div class="col-8">
                                    <input type="text" name="id_santri" class="form-control" aria-describedby="helpId"
                                        required="required"
                                        value="{{ old('id_santri', $raport_santri[0]->user->id_santri_fk) }}" disabled>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="nama_lengkap" class="col-4 form-label">Nama Lengkap</label>
                                <div class="col-8">
                                    <input type="text" name="nama_lengkap" class="form-control" aria-describedby="helpId"
                                        required="required"
                                        value="{{ old('nama_lengkap', $raport_santri[0]->user->santri->nama_lengkap) }}"
                                        disabled>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="jenis_kelamin" class="col-4 form-label">Jenis Kelamin</label>
                                <div class="col-8">
                                    <select name="jenis_kelamin" class="form-control" disabled>
                                        <option value="Laki-laki"
                                            {{ $raport_santri[0]->user->santri->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="Perempuan"
                                            {{ $raport_santri[0]->user->santri->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="id_program" class=" col-4 form-label">Program Akademik</label>
                                <div class="col-8">
                                    <select id="id_program" name="id_program" class="form-control" disabled>
                                        <option value="1"
                                            {{ $raport_santri[0]->user->santri->id_program == 1 ? 'selected' : '' }}>
                                            PKPPS
                                            Tingkat Wustho</option>
                                        <option value="2"
                                            {{ $raport_santri[0]->user->santri->id_program == 2 ? 'selected' : '' }}>
                                            PKPPS
                                            Tingkat Ulya</option>
                                        <option value="3"
                                            {{ $raport_santri[0]->user->santri->id_program == 3 ? 'selected' : '' }}>
                                            Takhosus
                                            Al-Qur'an</option>
                                        <option value="4"
                                            {{ $raport_santri[0]->user->santri->id_program == 4 ? 'selected' : '' }}>
                                            I'dad Ulya
                                        </option>
                                    </select>
                                </div>
                            </div>
                        @endif

                        {{-- Perulangan untuk setiap semester dan file raport --}}
                        @foreach ($raport_santri as $index => $item)
                            <div class="mb-3 row">
                                <label for="semester" class="col-4 form-label">{{ $item->semester }}</label>
                            </div>
                            <div class="mb-3 row">
                                <input type="file" id="raport_{{ $index }}"
                                    name="file_raport[{{ $index }}]" class="form-control" aria-describedby="helpId"
                                    accept="application/pdf">

                                <embed id="showraport_{{ $index }}"
                                    src="{{ !empty($item->file_raport) ? Storage::url('public/raport_semester/' . $item->file_raport) : url('assets/img/promotion/default.png') }}"
                                    type="application/pdf" width="100%" height="300px">
                            </div>
                        @endforeach

                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin-raport-santri.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            function handleRaportChange(index) {
                var raportInput = $('#raport_' + index);
                var showRaport = $('#showraport_' + index);

                raportInput.change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        showRaport.attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            }

            // Panggil fungsi handleRaportChange untuk setiap index
            @foreach ($raport_santri as $index => $item)
                handleRaportChange({{ $index }});
            @endforeach

            $('#pasphoto').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

        });
    </script>
@endsection
