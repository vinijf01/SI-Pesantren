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
                    action="{{ route('admin-data-santri.update', $data_santri->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" aria-describedby="helpId"
                                required="required" value="{{ old('nama_lengkap', $data_santri->nama_lengkap) }}">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="Laki-laki"
                                    {{ $data_santri->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan"
                                    {{ $data_santri->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="usia" class="form-label">Usia</label>
                            <input type="text" name="usia" class="form-control" aria-describedby="helpId"
                                required="required" value="{{ old('usia', $data_santri->usia) }}">
                        </div>
                        <div class="mb-3">
                            <label for="no_wa" class="form-label">Nomor Whatsapp</label>
                            <input type="text" name="no_wa" class="form-control" aria-describedby="helpId"
                                required="required" value="{{ old('no_wa', $data_santri->no_wa) }}">
                        </div>
                        <div class="mb-3">
                            <label for="pasphoto" class="form-label">Pasphoto</label>
                            <input type="file" id="pasphoto" name="pasphoto" class="form-control"
                                aria-describedby="helpId">

                            <div>
                                <img id="showImage"
                                    src="{{ !empty($data_santri->pasphoto) ? Storage::url('public/pasphoto/' . $data_santri->pasphoto) : url('assets/img/promotion/default.png') }}"
                                    alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="id_program" class="form-label">Program Akademik</label>
                            <select id="id_program" name="id_program" class="form-control">
                                <option value="1" {{ $data_santri->id_program == 1 ? 'selected' : '' }}>PKPPS
                                    Tingkat Wustho</option>
                                <option value="2" {{ $data_santri->id_program == 2 ? 'selected' : '' }}>PKPPS
                                    Tingkat Ulya</option>
                                <option value="3" {{ $data_santri->id_program == 3 ? 'selected' : '' }}>Takhosus
                                    Al-Qur'an</option>
                                <option value="4" {{ $data_santri->id_program == 4 ? 'selected' : '' }}>I'dad Ulya
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="TA" class="form-label">Tahun Ajaran</label>
                            <input type="text" name="TA" class="form-control" aria-describedby="helpId"
                                placeholder="2024/2025" required="required" value="{{ old('TA', $data_santri->TA) }}">
                        </div>

                        <div class="mb-3">
                            <label for="raport" class="form-label">File Raport</label>
                            <input type="file" id="raport" name="raport" class="form-control"
                                aria-describedby="helpId" accept="application/pdf">


                            <embed id="showraport"
                                src="{{ !empty($data_santri->raport) ? Storage::url('public/raport/' . $data_santri->raport) : url('assets/img/promotion/default.png') }}"
                                type="application/pdf" width="100%" height="300px">
                        </div>

                        <div class="mb-3">
                            <label for="sk_sekolah" class="form-label">File SK Sekolah</label>
                            <input type="file" id="sk_sekolah" name="sk_sekolah" class="form-control"
                                aria-describedby="helpId" accept="application/pdf">

                            <embed id="showSK"
                                src="{{ !empty($data_santri->sk_sekolah) ? Storage::url('public/sk_sekolah/' . $data_santri->sk_sekolah) : url('assets/img/promotion/default.png') }}"
                                type="application/pdf" width="100%" height="300px">
                        </div>

                        <div class="mb-3">
                            <label for="kk" class="form-label">File Kartu Keluarga</label>
                            <input type="file" id="kk" name="kk" class="form-control"
                                aria-describedby="helpId" accept="application/pdf">

                            <embed id="showkk"
                                src="{{ !empty($data_santri->kk) ? Storage::url('public/KK/' . $data_santri->kk) : url('assets/img/promotion/default.png') }}"
                                type="application/pdf" width="100%" height="300px">
                        </div>

                        <div class="mb-3">
                            <label for="akta" class="form-label">File Akta Kelahiran Calon Santri</label>
                            <input type="file" id="akta" name="akta" class="form-control"
                                aria-describedby="helpId" accept="application/pdf">

                            <embed id="showAkta"
                                src="{{ !empty($data_santri->akta) ? Storage::url('public/akta/' . $data_santri->akta) : url('assets/img/promotion/default.png') }}"
                                type="application/pdf" width="100%" height="300px">
                        </div>


                        <div class="mb-3">
                            <label for="ktp" class="form-label">File KTP Orang Tua / Wali </label>
                            <input type="file" id="ktp" name="ktp" class="form-control"
                                aria-describedby="helpId" accept="application/pdf">

                            <embed id="showKTP"
                                src="{{ !empty($data_santri->ktp) ? Storage::url('public/KTP/' . $data_santri->ktp) : url('assets/img/promotion/default.png') }}"
                                type="application/pdf" width="100%" height="300px">
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status Pendaftaran</label>
                            <select name="status" class="form-control">
                                <option value="Diterima" {{ $data_santri->status == 'Diterima' ? 'selected' : '' }}>
                                    Diterima</option>
                                <option value="Lolos" {{ $data_santri->status == 'Lolos' ? 'selected' : '' }}>
                                    Lolos
                                </option>
                                <option value="Gagal" {{ $data_santri->status == 'Gagal' ? 'selected' : '' }}>Gagal
                                </option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin-data-santri.index') }}" class="btn btn-danger">Batal</a>
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
