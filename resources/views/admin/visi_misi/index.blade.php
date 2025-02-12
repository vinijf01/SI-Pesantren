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
                        <th>Keterangan</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <th>Visi</th>
                        <td>{!! $visi_misi->visi !!}</td>

                    </tr>
                    <tr>
                        <th>Misi</th>
                        <td>{!! $visi_misi->misi !!}</td>
                        <td rowspan="3" class="text-center">
                            <a href="{{ route('admin-visi-misi.edit', $visi_misi->id) }}">
                                <i class='bx bx-edit crud-icon' style="font-size: 1.5em; color:green;" title="Edit"></i>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <th>Motto</th>
                        <td>{{ $visi_misi->motto }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br>
@endsection
