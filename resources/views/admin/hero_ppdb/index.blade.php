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
                        <th>Image</th>
                        <th>Nama Pesantren</th>
                        <th>judul</th>
                        <th>Tahun Ajaran</th>
                        <th>Link Tombol</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td><img src="{{ url('assets/img/hero/' . $hero_ppdb->image) }}" alt="Image-hero" height="100px"></td>
                        <td>{{ $hero_ppdb->nama_pesantren }}</td>
                        <td>{{ $hero_ppdb->judul }}</td>
                        <td>{{ $hero_ppdb->ta }}</td>
                        <td>{{ $hero_ppdb->link_btn }}</td>
                        <td>
                            <a href="{{ route('admin-hero-ppdb.edit', $hero_ppdb->id) }}">
                                <i class='bx bx-edit crud-icon' style="font-size: 1.5em; color:green;" title="Edit"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
