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
                                <?php
                                if (!empty($calon_santri->pasphoto)) {
                                    echo '<img id="showImage" src="' . Storage::url('public/pasphoto/' . $calon_santri->pasphoto) . '" alt="Current Image" style="max-width: 150px;">';
                                } else {
                                    echo '<p>Tidak ada file yang diupload</p>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nama_lengkap" class="col-4 form-label">Nama Lengkap</label>
                            <div class="col-8">
                                <input type="text" name="nama_lengkap" class="form-control" aria-describedby="helpId"
                                    required="required" value="{{ old('nama_lengkap', $calon_santri->nama_lengkap) }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="jenis_kelamin" class="col-4 form-label">Jenis Kelamin</label>
                            <div class="col-8">
                                <select name="jenis_kelamin" class="form-control" disabled>
                                    <option value="Laki-laki"
                                        {{ $calon_santri->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan"
                                        {{ $calon_santri->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="usia" class="col-4 form-label">Usia</label>
                            <div class="col-8">
                                <input type="text" name="usia" class="form-control" aria-describedby="helpId"
                                    required="required" value="{{ old('usia', $calon_santri->usia) }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="no_wa" class="col-4 form-label">Nomor Whatsapp</label>
                            <div class="col-8">
                                <input type="text" name="no_wa" class="form-control" aria-describedby="helpId"
                                    required="required" value="{{ old('no_wa', $calon_santri->no_wa) }}" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="id_program" class=" col-4 form-label">Program Akademik</label>
                            <div class="col-8">
                                <select id="id_program" name="id_program" class="form-control" disabled>
                                    @foreach ($program_akademik as $program)
                                        <option value="{{ $calon_santri->id_program }}"
                                            {{ $calon_santri->id_program == $program->id ? 'selected' : '' }}>
                                            {{ $program->nama_program }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status" class="col-4 form-label">Status Pendaftaran</label>
                            <div class="col-8">
                                <select name="status" class="form-control" disabled>
                                    <option value="Pendaftaran"
                                        {{ $calon_santri->status == 'Pendaftaran' ? 'selected' : '' }}>
                                        Pendaftaran</option>
                                    <option value="Diterima" {{ $calon_santri->status == 'Diterima' ? 'selected' : '' }}>
                                        Diterima
                                    </option>
                                    <option value="Ditolak" {{ $calon_santri->status == 'Ditolak' ? 'selected' : '' }}>
                                        Ditolak
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="raport" class=" col-4 form-label">File Raport</label><br>
                            <div class="col-12">
                                @if (!empty($calon_santri->raport))
                                    <embed id="showraport"
                                        src="{{ Storage::url('public/raport/' . $calon_santri->raport) }}"
                                        type="application/pdf" width="150%" height="300px">
                                @else
                                    <p>Tidak ada file yang diupload</p>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="sk_sekolah" class="col-4 form-label">File SK Sekolah</label><br>
                            <div class="col-12">
                                @if (!empty($calon_santri->sk_sekolah))
                                    <embed id="showSK"
                                        src="{{ Storage::url('public/sk_sekolah/' . $calon_santri->sk_sekolah) }}"
                                        type="application/pdf" width="150%" height="300px">
                                @else
                                    <p>Tidak ada file yang diupload</p>
                                @endif
                            </div>

                        </div>

                        <div class="mb-3 row">
                            <label for="kk" class="col-4 form-label">File Kartu Keluarga</label><br>
                            <div class="col-12">
                                @if (!empty($calon_santri->kk))
                                    <embed id="showkk" src="{{ Storage::url('public/KK/' . $calon_santri->kk) }}"
                                        type="application/pdf" width="150%" height="300px">
                                @else
                                    <p>Tidak ada file yang diupload</p>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="akta" class=" col-4 form-label">File Akta Kelahiran Calon Santri</label><br>
                            <div class="col-12">
                                @if (!empty($calon_santri->akta))
                                    <embed id="showAkta" src="{{ Storage::url('public/akta/' . $calon_santri->akta) }}"
                                        type="application/pdf" width="150%" height="300px">
                                @else
                                    <p>Tidak ada file yang diupload</p>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="ktp" class="col-4 form-label">File KTP Orang Tua / Wali </label><br>
                            <div class="col-12">
                                @if (!empty($calon_santri->ktp))
                                    <embed id="showKTP" src="{{ Storage::url('public/KTP/' . $calon_santri->ktp) }}"
                                        type="application/pdf" width="150%" height="300px">
                                @else
                                    <p>Tidak ada file yang diupload</p>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="bukti_pembayaran" class="col-4 form-label">Bukti Pembayaran</label>
                            <div class="col-8">
                                <?php
                                if (!empty($calon_santri->bukti_pembayaran)) {
                                    echo '<img id="showPembayaran" src="' . Storage::url('public/bukti_pembayaran/' . $calon_santri->bukti_pembayaran) . '" alt="Current Image" style="max-width: 150px;">';
                                } else {
                                    echo '<p>Tidak ada file yang diupload</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="mb-5">
                            <a href="{{ route('admin-ppdb-calon-santri.index') }}" class="btn btn-danger">Kembali</a>
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

            $('#bukti_pembayaran').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showPembayaran').attr('src', e.target.result);
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
