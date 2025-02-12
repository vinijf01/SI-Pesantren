@extends('ppdb.main')
@section('content')
    <form id="regForm" action="{{ route('pra-pendaftaran.store') }}" method="POST">
        @csrf
        <!-- One "tab" for each step in the form: -->
        <div class="tab">
            <h1>PPDB Pesantren Abdurrahman Bin Auf</h1>
            <p>Assalamu'alaikum Abu/Ummu calon santri Pesantren ABA</p>
            <p>Abu/Ummu dapat terlebih dahulu mengisi form yang kami sediakan untuk mendapatkan informasi ter-update
                mengenai Penerimaan Santri Baru Pesantren Abdurrahman Bin Auf</p>
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

        <div class="tab">No Whatsapp (WA) Abu/Umu:
            <p><input placeholder="+6282268xxxxxx" type="number" oninput="this.className = ''" name="no_wa"></p>
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

        <div class="tab">InsyaAllah akan mendaftar Ponpes ABA pada tahun berapa:
            <p>
                <select name="tahun_ajaran" onchange="this.className=''">
                    <option value="" selected disabled>Pilih Tahun Ajaran</option>
                    <option value="2025/2026">T.A 2025/2026</option>
                    <option value="2026/2027">T.A 2026/2027</option>
                    <option value="2027/2028">T.A 2027/2028</option>
                    <option value="2028/2029">Setelahnya</option>
                </select>
            </p>
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
        </div>
    </form>
@endsection
