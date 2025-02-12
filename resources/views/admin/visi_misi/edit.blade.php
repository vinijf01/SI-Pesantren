@extends('layouts.main_admin')
@section('content')
    <h1>Edit {{ $title }}</h1>
    <div class="card mb-5">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-8">
                    <h5>Edit {{ $title }}</h5>
                </div>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <div class="row">
                <form class="needs-validation forms-sample" method="POST"
                    action="{{ route('admin-visi-misi.update', $visi_misi->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="col-lg-6 offset-2 col-md-4">
                        @include('partials.messages')
                        <div class="mb-3">
                            <label for="visi" class="form-label">Visi</label>
                            <textarea id="visi" type="text" class="form-control tinymce-light tinymce-editor " name="visi">{{ $visi_misi->visi }}</textarea><br>
                        </div>
                        <div class="mb-3">
                            <label for="misi" class="form-label">Misi</label>
                            <textarea id="misi" type="text" class="form-control tinymce-light tinymce-editor " name="misi">{{ $visi_misi->misi }}</textarea><br>

                        </div>
                        <div class="mb-3">
                            <label for="motto" class="form-label">Motto</label>
                            <input type="text" id="motto" name="motto" class="form-control"
                                aria-describedby="helpId" value="{{ old('motto', $visi_misi->motto) }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin-visi-misi.index') }}" class="btn btn-danger">Batal</a>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
