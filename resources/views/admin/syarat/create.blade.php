@extends('layouts.main_admin')
@section('content')
    <h1>Tambah {{ $title }}</h1>
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
                <form class="needs-validation forms-sample" method="POST" action="{{ route('admin-ppdb-syarat.store') }}"
                    novalidate>
                    @csrf
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="syarat" class="form-label">Syarat</label>
                            <input type="text" name="syarat" class="form-control" aria-describedby="helpId"
                                required="required">
                        </div>
                    </div>
                    <div class="mb-5">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin-ppdb-syarat.index') }}" class="btn btn-danger">Batal</a>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
