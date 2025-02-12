@extends('ppdb.main')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <form id="regForm" action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- One "tab" for each step in the form: -->
        <div class="tab">
            <h1>PPDB Pesantren Abdurrahman Bin Auf</h1>
            <p>Assalamu'alaikum Abu/Ummu calon santri Pesantren ABA</p>
            <p>Sebelum Abu/Ummu mengisi formulir yang kami sediakan, pastikan semua file berkas yang dibutuhkan sudah
                dipersiapkan untuk informasi berkas apa saja yang dibutuhkan dapat dilihat pada<a href="{{ route('ppdb') }}">
                    Halahan PPDB [Disini]</a></p>
        </div>

        <div class="tab">Nama Calon Santri:
            <p><input placeholder="Nama lengkap" oninput="this.className = ''" name="nama_lengkap"></p>
        </div>

        <div class="tab">Jenis Kelamin:
            <p>
                <select name="jenis_kelamin" onchange="this.className=''">
                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </p>
        </div>

        <div class="tab">Usia:
            <p><input placeholder="15" type="number" oninput="this.className = ''" name="usia"></p>
        </div>

        <div class="tab">No Whatsapp (WA) Abu/Ummu:
            <p><input placeholder="6282268xxxxxx" type="number" oninput="this.className = ''" name="no_wa"></p>
        </div>

        <div class="tab">Program yang Ingin Diikuti:
            <p> <select name="id_program" onchange="this.className=''">
                    <option value="" selected disabled>Pilih Program Akademik</option>
                    <option value="1">PKPPS Tingkat Wustho</option>
                    <option value="2">PKPPS Tingkat Ulya</option>
                    <option value="3">Takhosus Al-Qur'an</option>
                    <option value="4">I'dad Ulya</option>
                </select></p>
        </div>

        <div class="tab">
            <label for="bukti_pembayaran" class="form-label"> File Bukti Pembayaran Uang Pendaftaran</label>
            <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="form-control"
                aria-describedby="helpId" placeholder="mimes:png,jpg,jpeg">
            <div>
                <img id="showPembayaran" src="{{ url('assets/img/gallery/1.png') }}" alt="Current Image"
                    style="max-width: 100px; margin-top: 10px;">
            </div>
        </div>


        <div class="tab">
            <label for="pasphoto" class="form-label">Pasphoto</label>
            <input type="file" id="pasphoto" name="pasphoto" class="form-control" aria-describedby="helpId"
                placeholder="mimes:png,jpg,jpeg">

            <div>
                <img id="showImage" src="{{ url('assets/img/gallery/1.png') }}" alt="Current Image"
                    style="max-width: 100px; margin-top: 10px;">
            </div>
        </div>

        <div class="tab">
            <label for="sk_sekolah" class="form-label">File Surat Keterangan Duduk di kelas 6 SD (Wustho) atau SK Duduk di
                kelas 9 (Ulya &
                I'dad)</label><br>
            <small>Bagi Program Takhosus Al-Qur'an silahkan dikosongkan</small>
            <input type="file" id="sk_sekolah" name="sk_sekolah" class="form-control" aria-describedby="helpId"
                accept="application/pdf" placeholder="Surat Keterangan Sekolah.pdf">
            <div>
                <iframe id="showSkSekolah" src="" width="100%" height="500px" frameborder="0"></iframe>
            </div>
        </div>

        <div class="tab">
            <label for="raport" class="form-label">File Raport kelas 5 atau kelas 8 </label>
            <input type="file" id="raport" name="raport" class="form-control" aria-describedby="helpId"
                accept="application/pdf" placeholder="Raport Sekolah.pdf">

            <div>
                <iframe id="showRaport" src="" width="100%" height="500px" frameborder="0"></iframe>
            </div>
        </div>

        <div class="tab">
            <label for="akta" class="form-label">File Akta Kelahiran Calon Santri</label>
            <input type="file" id="akta" name="akta" class="form-control" aria-describedby="helpId"
                accept="application/pdf" placeholder="Akta Kelahiran.pdf">

            <div>
                <iframe id="showAkta" src="" width="100%" height="500px" frameborder="0"></iframe>
            </div>
        </div>

        <div class="tab">
            <label for="kk" class="form-label">File Kartu Keluarga</label>
            <input type="file" id="kk" name="kk" class="form-control" aria-describedby="helpId"
                accept="application/pdf" placeholder="Kartu Keluarga.pdf">

            <div>
                <iframe id="showKk" src="" width="100%" height="500px" frameborder="0"></iframe>
            </div>
        </div>

        <div class="tab">
            <label for="ktp" class="form-label">File KTP Orang Tua / Wali</label>
            <input type="file" id="ktp" name="ktp" class="form-control" aria-describedby="helpId"
                accept="application/pdf" placeholder="KTP.pdf">

            <div>
                <iframe id="showKTP" src="" width="100%" height="500px" frameborder="0"></iframe>
            </div>
        </div>

        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>
        <!-- Circles which indicate the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>

        </div>
    </form>
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

            // Menampilkan preview PDF raport
            $('#raport').change(function(e) {
                const file = this.files[0];

                if (file && file.type === "application/pdf") {
                    const fileURL = URL.createObjectURL(file);
                    $('#showRaport').attr('src', fileURL);
                } else {
                    $('#showRaport').attr('src', "{{ url('assets/img/gallery/1.png') }}");
                }
            });
            $('#sk_sekolah').change(function(e) {
                const file = this.files[0];

                if (file && file.type === "application/pdf") {
                    const fileURL = URL.createObjectURL(file);
                    $('#showSkSekolah').attr('src', fileURL);
                } else {
                    $('#showSkSekolah').attr('src', "{{ url('assets/img/gallery/1.png') }}");
                }
            });
            $('#akta').change(function(e) {
                const file = this.files[0];

                if (file && file.type === "application/pdf") {
                    const fileURL = URL.createObjectURL(file);
                    $('#showAkta').attr('src', fileURL);
                } else {
                    $('#showAkta').attr('src', "{{ url('assets/img/gallery/1.png') }}");
                }
            });
            $('#kk').change(function(e) {
                const file = this.files[0];

                if (file && file.type === "application/pdf") {
                    const fileURL = URL.createObjectURL(file);
                    $('#showKk').attr('src', fileURL);
                } else {
                    $('#showKk').attr('src', "{{ url('assets/img/gallery/1.png') }}");
                }
            });
            $('#ktp').change(function(e) {
                const file = this.files[0];

                if (file && file.type === "application/pdf") {
                    const fileURL = URL.createObjectURL(file);
                    $('#showKTP').attr('src', fileURL);
                } else {
                    $('#showKTP').attr('src', "{{ url('assets/img/gallery/1.png') }}");
                }
            });

        });
    </script>
@endsection
