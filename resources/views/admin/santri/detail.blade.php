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
                <form class="needs-validation forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')

                        <div class="mb-3 row">
                            <label for="nama_lengkap" class="col-4 form-label">PasPhoto</label>
                            <div class="col-8">
                                <div class="col-auto"> <img id="showImage"
                                        src="{{ !empty($data_santri->pasphoto) ? Storage::url('public/pasphoto/' . $data_santri->pasphoto) : url('assets/img/program/details-1.jpg') }}"
                                        alt="Current Image" style="max-width: 150px;">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="id_santri" class="col-4 form-label">ID Santri</label>
                            <div class="col-8">
                                <input type="text" name="id_santri" class="form-control" aria-describedby="helpId"
                                    required="required" value="{{ old('id_santri', $data_santri->id_santri) }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nama_lengkap" class="col-4 form-label">Nama Lengkap</label>
                            <div class="col-8">
                                <input type="text" name="nama_lengkap" class="form-control" aria-describedby="helpId"
                                    required="required" value="{{ old('nama_lengkap', $data_santri->nama_lengkap) }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="jenis_kelamin" class="col-4 form-label">Jenis Kelamin</label>
                            <div class="col-8">
                                <select name="jenis_kelamin" class="form-control" disabled>
                                    <option value="Laki-laki"
                                        {{ $data_santri->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ $data_santri->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="usia" class="col-4 form-label">Usia</label>
                            <div class="col-8">
                                <input type="text" name="usia" class="form-control" aria-describedby="helpId"
                                    required="required" value="{{ old('usia', $data_santri->usia) }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="no_wa" class="col-4 form-label">Nomor Whatsapp</label>
                            <div class="col-8">
                                <input type="text" name="no_wa" class="form-control" aria-describedby="helpId"
                                    required="required" value="{{ old('no_wa', $data_santri->no_wa) }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="id_program" class=" col-4 form-label">Program Akademik</label>
                            <div class="col-8">
                                <select id="id_program" name="id_program" class="form-control" disabled>
                                    <option value="1" {{ $data_santri->id_program == 1 ? 'selected' : '' }}>PKPPS
                                        Tingkat Wustho</option>
                                    <option value="2" {{ $data_santri->id_program == 2 ? 'selected' : '' }}>PKPPS
                                        Tingkat Ulya</option>
                                    <option value="3" {{ $data_santri->id_program == 3 ? 'selected' : '' }}>Takhosus
                                        Al-Qur'an</option>
                                    <option value="4" {{ $data_santri->id_program == 4 ? 'selected' : '' }}>I'dad
                                        Ulya
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status" class="col-4 form-label">Status Pendaftaran</label>
                            <div class="col-8">
                                <select name="status" class="form-control" disabled>
                                    <option value="Pendaftaran"
                                        {{ $data_santri->status == 'Pendaftaran' ? 'selected' : '' }}>
                                        Pendaftaran</option>
                                    <option value="Diterima" {{ $data_santri->status == 'Diterima' ? 'selected' : '' }}>
                                        Diterima
                                    </option>
                                    <option value="Ditolak" {{ $data_santri->status == 'Ditolak' ? 'selected' : '' }}>
                                        Ditolak
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="raport" class=" col-4 form-label">File Raport</label><br>
                            <div class="col-12">
                                <embed id="showraport"
                                    src="{{ !empty($data_santri->raport) ? Storage::url('public/raport/' . $data_santri->raport) : url('assets/img/program/details-1.jpg') }}"
                                    type="application/pdf" width="150%" height="300px">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="sk_sekolah" class="col-4 form-label">File SK Sekolah</label><br>

                            <div class="col-12">
                                <embed id="showSK"
                                    src="{{ !empty($data_santri->sk_sekolah) ? Storage::url('public/sk_sekolah/' . $data_santri->sk_sekolah) : url('assets/img/program/details-1.jpg') }}"
                                    type="application/pdf" width="150%" height="300px">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="kk" class="col-4 form-label">File Kartu Keluarga</label><br>
                            <div class="col-12">
                                <embed id="showkk"
                                    src="{{ !empty($data_santri->kk) ? Storage::url('public/KK/' . $data_santri->kk) : url('assets/img/program/details-1.jpg') }}"
                                    type="application/pdf" width="150%" height="300px">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="akta" class=" col-4 form-label">File Akta Kelahiran Calon Santri</label><br>
                            <div class="col-12">
                                <embed id="showAkta"
                                    src="{{ !empty($data_santri->akta) ? Storage::url('public/akta/' . $data_santri->akta) : url('assets/img/program/details-1.jpg') }}"
                                    type="application/pdf" width="150%" height="300px">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="ktp" class="col-4 form-label">File KTP Orang Tua / Wali </label><br>
                            <div class="col-12">
                                <embed id="showKTP"
                                    src="{{ !empty($data_santri->ktp) ? Storage::url('public/KTP/' . $data_santri->ktp) : url('assets/img/program/details-1.jpg') }}"
                                    type="application/pdf" width="150%" height="300px">
                            </div>
                        </div>


                        <div class="mb-5">
                            <a href="{{ route('admin-data-santri.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#pasphoto').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

            $('#raport').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showraport').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#kk').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showkk').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#sk_sekolah').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showSK').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#akta').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showAkta').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
            $('#ktp').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showKTP').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
