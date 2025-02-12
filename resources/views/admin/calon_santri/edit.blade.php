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
                    action="{{ route('admin-ppdb-calon-santri.update', $calon_santri->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" aria-describedby="helpId"
                                required="required" value="{{ old('nama_lengkap', $calon_santri->nama_lengkap) }}">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="Laki-laki"
                                    {{ $calon_santri->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan"
                                    {{ $calon_santri->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="usia" class="form-label">Usia</label>
                            <input type="text" name="usia" class="form-control" aria-describedby="helpId"
                                required="required" value="{{ old('usia', $calon_santri->usia) }}">
                        </div>
                        <div class="mb-3">
                            <label for="no_wa" class="form-label">Nomor Whatsapp</label>
                            <input type="text" name="no_wa" class="form-control" aria-describedby="helpId"
                                required="required" value="{{ old('no_wa', $calon_santri->no_wa) }}">
                        </div>
                        <div class="mb-3">
                            <label for="pasphoto" class="form-label">Pasphoto</label>
                            <input type="file" id="pasphoto" name="pasphoto" class="form-control"
                                aria-describedby="helpId">

                            <div>
                                <img id="showImage"
                                    src="{{ !empty($calon_santri->pasphoto) ? Storage::url('public/pasphoto/' . $calon_santri->pasphoto) : url('assets/img/program/details-1.jpg') }}"
                                    alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="id_program" class="form-label">Program Akademik</label>
                            <select id="id_program" name="id_program" class="form-control" required>
                                <option value="">Pilih Program Akademik</option>
                                @foreach ($program as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $calon_santri->id_program ? 'selected' : '' }}>
                                        {{ $item->nama_program }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="TA" class="form-label">Tahun Ajaran</label>
                            <input type="text" name="TA" class="form-control" aria-describedby="helpId"
                                placeholder="2024/2025" required="required" value="{{ old('TA', $calon_santri->TA) }}">
                        </div>

                        <div class="mb-3">
                            <label for="raport" class="form-label">File Raport</label>
                            <input type="file" id="raport" name="raport" class="form-control"
                                aria-describedby="helpId" accept="application/pdf">


                            <embed id="showraport"
                                src="{{ !empty($calon_santri->raport) ? Storage::url('public/raport/' . $calon_santri->raport) : url('assets/img/program/details-1.jpg') }}"
                                type="application/pdf" width="100%" height="300px">
                        </div>

                        <div class="mb-3">
                            <label for="sk_sekolah" class="form-label">File SK Sekolah</label>
                            <input type="file" id="sk_sekolah" name="sk_sekolah" class="form-control"
                                aria-describedby="helpId" accept="application/pdf">

                            <embed id="showSK"
                                src="{{ !empty($calon_santri->sk_sekolah) ? Storage::url('public/sk_sekolah/' . $calon_santri->sk_sekolah) : 'Tidak Ada File' }}"
                                type="application/pdf" width="100%" height="300px">
                        </div>

                        <div class="mb-3">
                            <label for="kk" class="form-label">File Kartu Keluarga</label>
                            <input type="file" id="kk" name="kk" class="form-control"
                                aria-describedby="helpId" accept="application/pdf">

                            <embed id="showkk"
                                src="{{ !empty($calon_santri->kk) ? Storage::url('public/KK/' . $calon_santri->kk) : url('assets/img/program/details-1.jpg') }}"
                                type="application/pdf" width="100%" height="300px">
                        </div>

                        <div class="mb-3">
                            <label for="akta" class="form-label">File Akta Kelahiran Calon Santri</label>
                            <input type="file" id="akta" name="akta" class="form-control"
                                aria-describedby="helpId" accept="application/pdf">

                            <embed id="showAkta"
                                src="{{ !empty($calon_santri->akta) ? Storage::url('public/akta/' . $calon_santri->akta) : url('assets/img/program/details-1.jpg') }}"
                                type="application/pdf" width="100%" height="300px">
                        </div>


                        <div class="mb-3">
                            <label for="ktp" class="form-label">File KTP Orang Tua / Wali </label>
                            <input type="file" id="ktp" name="ktp" class="form-control"
                                aria-describedby="helpId" accept="application/pdf">

                            <embed id="showKTP"
                                src="{{ !empty($calon_santri->ktp) ? Storage::url('public/ktp/' . $calon_santri->ktp) : url('assets/img/program/details-1.jpg') }}"
                                type="application/pdf" width="100%" height="300px">
                        </div>

                        <div class="mb-3">
                            <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                            <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="form-control"
                                aria-describedby="helpId">

                            <div>
                                <img id="showPembayaran"
                                    src="{{ !empty($calon_santri->bukti_pembayaran) ? Storage::url('public/bukti_pembayaran/' . $calon_santri->bukti_pembayaran) : url('assets/img/program/details-1.jpg') }}"
                                    alt="Current Image" style="max-width: 100px; margin-top: 10px;">
                            </div>

                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status Pendaftaran</label>
                            <select name="status" class="form-control">
                                <option value="Pendaftaran"
                                    {{ $calon_santri->status == 'Pendaftaran' ? 'selected' : '' }}>
                                    Pendaftaran</option>
                                <option value="Diterima" {{ $calon_santri->status == 'Diterima' ? 'selected' : '' }}>
                                    Diterima
                                </option>
                                <option value="Ditolak" {{ $calon_santri->status == 'Ditolak' ? 'selected' : '' }}>Ditolak
                                </option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin-ppdb-calon-santri.index') }}" class="btn btn-danger">Batal</a>
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
