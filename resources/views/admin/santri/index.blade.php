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
                        <th>ID Santri</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>TA</th>
                        <th>Whatsapp</th>
                        <th>Program</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($santri as $index => $item)
                        <tr style="text-align: center">
                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                            <td>{{ $item->id_santri }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->TA }}</td>
                            {{-- <td style="text-align: center">
                                <a href="https://api.whatsapp.com/send?phone={{ $item->no_wa }}&text=Assalamu'alaikum%20Warahmatullahi%20Wabarakatuh,%20Abu/Ummu%20{{ urlencode($item->nama_lengkap) }},%0A%0ATerima%20kasih%20telah%20mengikuti%20proses%20seleksi%20di%20Pesantran%20Abdurrahman%20Bin%20Auf,%20dengan%20senang%20hati%20kami%20informasikan%20bahwa%20{{ urlencode($item->nama_lengkap) }} %20dinyatakan%20*LOLOS%20SELEKSI*.%0A%0ABerikut%20adalah%20akun%20untuk%20melihat%20kemajuan%20belajar%20santri%20di%20website%20pesantren%20silahkan%20aksess%20:%0A%0A-%20**Website**:%20https://ponpesaba.sch.id%0A%0A-%20**ID%20Santri*:%20{{ urlencode($item->id_santri) }}%0A%0A-%20*Password*:%20{{ urlencode($item->password) }}%0A%0AKami%20akan%20mengupdate%20perkembangan%20belajar%20santri%203%20bulan%20sekali.
                                    %0A%0ASalam,%0APondok%20Pesantren%20Abdurrahman%20Bin%20Auf"
                                    target="_blank">
                                    <i class='menu-icon bx bxl-whatsapp'></i>
                                </a>
                            </td> --}}
                            <td style="text-align: center">
                                @if ($item->status == 'Lolos')
                                    <a href="https://api.whatsapp.com/send?phone={{ $item->no_wa }}&text=Assalamu'alaikum%20Warahmatullahi%20Wabarakatuh,%20Abu/Ummu%20{{ urlencode($item->nama_lengkap) }},%0A%0ATerima%20kasih%20telah%20mengikuti%20proses%20seleksi%20di%20Pesantran%20Abdurrahman%20Bin%20Auf,%20dengan%20senang%20hati%20kami%20informasikan%20bahwa%20{{ urlencode($item->nama_lengkap) }} %20dinyatakan%20*LOLOS%20SELEKSI*.%0A%0ABerikut%20adalah%20akun%20untuk%20melihat%20kemajuan%20belajar%20santri%20di%20website%20pesantren%20silahkan%20aksess%20:%0A%0A-%20**Website**:%20https://ponpesaba.sch.id%0A%0A-%20**ID%20Santri*:%20{{ urlencode($item->id_santri) }}%0A%0A-%20*Password*:%20{{ urlencode($item->password) }}%0A%0AKami%20akan%20mengupdate%20perkembangan%20belajar%20santri%203%20bulan%20sekali.
                                    %0A%0ASalam,%0APondok%20Pesantren%20Abdurrahman%20Bin%20Auf"
                                        target="_blank">
                                        <i class='menu-icon bx bxl-whatsapp'></i>
                                    </a>
                                @elseif($item->status == 'Gagal')
                                    <a href="https://api.whatsapp.com/send?phone={{ $item->no_wa }}&text=Assalamu'alaikum%20Warahmatullahi%20Wabarakatuh,%20{{ urlencode($item->nama_lengkap) }}%20%0A%0ATerima%20kasih%20telah%20mengikuti%20di%20Pondok%20Pesantren%20Abdurrahman%20Bin%20Auf"
                                        target="_blank">
                                        <i class='menu-icon bx bxl-whatsapp'></i>
                                    </a>
                                @elseif($item->status == 'Diterima')
                                    <i class='menu-icon bx bxl-whatsapp' onclick="showPopup()"></i>
                                    <script>
                                        function showPopup() {
                                            alert("Pastikan Anda telah memperbarui status terlebih dahulu.");
                                        }
                                    </script>
                                @endif
                            </td>
                            <td>{{ $item->programAkademik->nama_program }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('admin-data-santri.edit', $item->id) }}">
                                    <i class='bx bx-edit crud-icon' style="font-size: 1.5em; color:green;"
                                        title="Edit"></i>
                                </a>
                                <a href="{{ route('data-santri.detail', $item->id) }}">
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
                                        <form action="{{ route('admin-data-santri.destroy', $item->id) }}" method="POST">
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
@endsection
