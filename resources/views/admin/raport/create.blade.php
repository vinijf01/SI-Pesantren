@extends('layouts.main_admin')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <form class="needs-validation forms-sample" method="POST" action="{{ route('admin-raport-santri.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @include('partials.messages')
                    <div class="col-lg-6 offset-2 col-md-4">
                        <div class="mb-3">
                            <label for="id_santri" class="form-label">Nama Santri</label>
                            <select class="form-select" id="id_santri" name="id_santri" aria-describedby="helpId">
                                <option value="">Pilih Nama Santri</option>
                                @foreach ($santri as $user)
                                    <option value="{{ $user->id_santri_fk }}">{{ $user->nama }}</option>
                                @endforeach
                            </select>
                            <label for="semester" class="form-label">Semester</label>
                            <select class="form-select" id="semester" name="semester" aria-describedby="helpId">
                                <option value="">Pilih Semester</option>
                                <option value="Semester 1">Semester 1</option>
                                <option value="Semester 2">Semester 2</option>
                                <option value="Semester 3">Semester 3</option>
                                <option value="Semester 4">Semester 4</option>
                                <option value="Semester 5">Semester 5</option>
                                <option value="Semester 6">Semester 6</option>
                            </select>
                            <label for="file_raport" class="form-label">File Raport</label>
                            <input type="file" class="form-control" id="raport" name="file_raport"
                                aria-describedby="helpId" accept="application/pdf">

                            <div>
                                <iframe id="showRaport" src="" width="100%" height="500px"
                                    frameborder="0"></iframe>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin-raport-santri.index') }}" class="btn btn-danger">Batal</a>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#raport').change(function(e) {
                const file = this.files[0];

                if (file && file.type === "application/pdf") {
                    const fileURL = URL.createObjectURL(file);
                    $('#showRaport').attr('src', fileURL);
                } else {
                    $('#showRaport').attr('src', "{{ url('assets/img/gallery/1.png') }}");
                }
            });
        });
    </script>
@endsection
