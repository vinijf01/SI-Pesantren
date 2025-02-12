@extends('layouts.main_admin')
@section('content')
    <h1>{{ $title }}</h1>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8">
                    <h5>{{ $title }}</h5>
                </div>
                <div class="col-lg-4 text-end mb-3">
                    <a href="{{ route('admin-raport-santri.create') }}" class="btn btn-success"><i class='bx bx-plus-circle'
                            style="font-size: 1.5em"></i> Tambah
                        {{ $title }}</a>
                </div>
                @include('partials.messages')
            </div>
        </div>
        <div class="table-responsive text-nowrap p-3">
            <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Santri</th>
                        <th>Program</th>
                        <th>T.A</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php
                        $displayedSantri = [];
                    @endphp
                    @foreach ($report_santri as $index => $item)
                        @if (!in_array($item->user->santri->id_santri, $displayedSantri))
                            <tr>
                                <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                <td>{{ $item->user->nama }}</td>
                                <td>{{ $item->user->santri->programAkademik->nama_program }}</td>
                                <td>{{ $item->user->santri->TA }}</td>
                                <td>
                                    <a href="{{ route('admin-raport-santri.edit', $item->id_santri) }}">
                                        <i class='bx bx-edit crud-icon' style="font-size: 1.5em; color:green;"
                                            title="Edit"></i>
                                    </a>
                                    <a href="{{ route('data-raport.detail', $item->id_santri) }}">
                                        <i class='bx bxs-show crud-icon' style="font-size: 1.5em; color:blue;"
                                            title="read"></i>
                                    </a>
                                    <button type="button" class="bg-transparent border-0" data-bs-toggle="modal"
                                        data-bs-target="#basicModal{{ $item->id_santri }}">
                                        <i class='bx bxs-eraser' style="font-size: 1.5em; color:red;"title="Hapus"></i>
                                    </button>
                                </td>
                            </tr>

                            {{-- Modal Delete --}}
                            <div class="modal fade" id="basicModal{{ $item->id_santri }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel1">Hapus Data {{ $title }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">Apakah Anda Yakin Ingin Menghapus?</div>
                                        <div class="modal-footer">
                                            <form action="{{ route('admin-raport-santri.destroy', $item->id_santri) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>

                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">
                                                Batal
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- end modal --}}
                            @php
                                $displayedSantri[] = $item->user->santri->id_santri;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
