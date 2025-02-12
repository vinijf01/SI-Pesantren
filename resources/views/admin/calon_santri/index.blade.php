@extends('layouts.main_admin')
@section('content')
    <h1>{{ $title }}</h1>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8">
                    <h5>{{ $title }}</h5>
                </div>
                @include('partials.messages')
            </div>
        </div>
        <div class="table-responsive text-nowrap p-3">
            <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Calon Santri</th>
                        <th>Pasphoto</th>
                        <th>Jenis Kelamin</th>
                        <th>Usia</th>
                        <th>Whatsapp</th>
                        <th>Program</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($calon_santri as $index => $item)
                        <tr style="text-align: center">
                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td> <img src="{{ Storage::url('public/pasphoto/' . $item->pasphoto) }}" alt="Pasphoto"
                                    height="100px">

                            </td>

                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->usia }}</td>
                            <td style="text-align: center">
                                @if ($item->status == 'Diterima')
                                    <a href="https://api.whatsapp.com/send?phone={{ $item->no_wa }}&text=Assalamu'alaikum%20Warahmatullahi%20Wabarakatuh,%20{{ urlencode($item->nama_lengkap) }}%20%0A%0ATerima%20kasih%20telah%20mendaftar%20di%20Pondok%20Pesantren%20Abdurrahman%20Bin%20Auf.%0A%0APendaftaran%20Abu/umma%20telah%20kami%20terima.%0AKami%20akan%20segera%20memproses%20pendaftarannya%20dan%20akan%20menghubungi%20kembali%20untuk%20jadwal%20wawancara.%0A%0ASalam,%0APondok%20Pesantren%20Abdurrahman%20Bin%20Auf"
                                        target="_blank">
                                        <i class='menu-icon bx bxl-whatsapp'></i>
                                    </a>
                                @elseif($item->status == 'Ditolak')
                                    <a href="https://api.whatsapp.com/send?phone={{ $item->no_wa }}&text=Assalamu'alaikum%20Warahmatullahi%20Wabarakatuh,%20{{ urlencode($item->nama_lengkap) }}%20%0A%0ATerima%20kasih%20telah%20mendaftar%20di%20Pondok%20Pesantren%20Abdurrahman%20Bin%20Auf.%0A%0APendaftaran%20Abu/umma%20telah%20kami%20terima.%0AMohon%20maaf%20untuk%20saat%20ini%20kami%20tidak%20bisa%20memproses%20pendaftaran%20abu/umma%20lebih%20lanjut%20karena%20belum%20memenuhi%20syarat%20pendaftaran.%0ASilah%20hubungi%20kami%20kembali,%20jika%20ada%20hal%20yang%20abu/umma%20ingin%20tanyakan.%0A%0ASalam,%0APondok%20Pesantren%20Abdurrahman%20Bin%20Auf"
                                        target="_blank">
                                        <i class='menu-icon bx bxl-whatsapp'></i>
                                    </a>
                                @elseif($item->status == 'Pendaftaran')
                                    <i class='menu-icon bx bxl-whatsapp' onclick="showPopup()"></i>
                                    <script>
                                        function showPopup() {
                                            alert("Pastikan Anda telah memperbarui status pendaftaran terlebih dahulu.");
                                        }
                                    </script>
                                @endif
                            </td>


                            <td>{{ $item->program->nama_program }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('admin-ppdb-calon-santri.edit', $item->id) }}">
                                    <i class='bx bx-edit crud-icon' style="font-size: 1.5em; color:green;"
                                        title="Edit"></i>
                                </a>
                                <a href="{{ route('ppdb-calon-santri.detail', $item->id) }}">
                                    <i class='bx bxs-show crud-icon' style="font-size: 1.5em; color:blue;"
                                        title="read"></i>
                                </a>
                                <button type="button" class="bg-transparent border-0" data-bs-toggle="modal"
                                    data-bs-target="#basicModal{{ $item->id }}">
                                    <i class='bx bxs-eraser' style="font-size: 1.5em; color:red;"title="Hapus"></i>
                                </button>
                            </td>
                        </tr>

                        {{-- Modal Delete --}}
                        <div class="modal fade" id="basicModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Hapus Data {{ $title }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">Apakah Anda Yakin Ingin Menghapus?</div>
                                    <div class="modal-footer">
                                        <form action="{{ route('admin-ppdb-calon-santri.destroy', $item->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>

                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Batal
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- end modal --}}
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <br>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8">
                    <h5>{{ $title2 }}</h5>
                </div>
                <div class="col-lg-4 text-end mb-3">
                    <a href="#" class="btn btn-success" onclick="confirmTambah()"><i class='bx bx-plus-circle'
                            style="font-size: 1.5em"></i> Tambah {{ $title2 }}</a>
                </div>

                <script>
                    function confirmTambah() {
                        var confirmation = confirm("Apakah Anda yakin? Pastikan semua data sudah benar.");

                        if (confirmation) {
                            // Jika pengguna mengonfirmasi, arahkan ke tautan
                            window.location.href = "{{ route('ppdb-calon-santri.cetakLaporan') }}";
                        } else {
                            // Jika pengguna membatalkan, tidak lakukan apa-apa
                        }
                    }
                </script>

                @include('partials.messages')
            </div>
        </div>
        <div class="table-responsive text-nowrap p-3">
            <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun</th>
                        <th>Laporan</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($laporan_calon_santri as $index => $file_laporan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $file_laporan->T_A }}</td>
                            <td>
                                <a href="{{ route('lihat-laporan', ['filename' => $file_laporan->laporan]) }}"
                                    target="_blank">Lihat Laporan</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
