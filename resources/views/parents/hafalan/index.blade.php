@extends('layouts.main_parent')
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
                        <th>Nama Santri</th>
                        <th>Tanggal</th>
                        <th>Surat</th>
                        <th>Ayat</th>
                        <th>Total Hafalan</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($hafalan as $index => $item)
                        <tr>
                            <th class="text-center" scope="row">{{ $index + 1 }}</th>
                            <td>{{ $item->user->nama }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->surat }}</td>
                            <td>{{ $item->ayat }}</td>
                            <td>{{ $item->total_hafalan }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
