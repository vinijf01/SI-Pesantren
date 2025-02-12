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
                        <th>Action</th>
                        <th>Program</th>
                        <th>Image</th>
                        <th>Judul 1</th>
                        <th>Deskripsi 1</th>
                        <th>Judul 2</th>
                        <th>Deksripsi 2</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($keterangan_kelas as $item)
                        <tr>
                            <td>
                                <a href="{{ route('admin-keterangan-kelas.edit', $item->id) }}">
                                    <i class='bx bx-edit crud-icon' style="font-size: 1.5em; color:green;" title="Edit"></i>
                                </a>
                            </td>
                            <td>{{ $item->program->nama_program }}</td>

                            <td><img src="{{ url('assets/img/program/' . $item->image) }}" alt="Image-hero" height="100px">
                            </td>
                            <td>{{ $item->judul_1 }}</td>
                            <td>{!! $item->deskripsi_judul_1 !!}</td>
                            <td>{{ $item->judul_2 }}</td>
                            <td>{!! $item->deskripsi_judul_2 !!}</td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
