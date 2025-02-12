@extends('layouts.main_parent')
@section('content')
    <h1>{{ $title }}</h1>
    <div class="card">
        <div class="table-responsive text-nowrap p-3">
            <table class="table table-striped datatable">
                <thead>
                    <tr>
                        <th>Semester</th>
                        <th>Raport</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($raport_santri as $index => $item)
                        <tr>
                            <td>{{ $item->semester }}</td>
                            <td>
                                <a href="#" class="open-modal" data-target="#raportModal{{ $index }}">
                                    Lihat Raport
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="raportModal{{ $index }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Raport Semester
                                                    {{ $item->semester }}</h5>
                                                <button type="button" class="close" aria-label="Close">
                                                    <a href="{{ route('progress-santri.index') }}" data-dismiss="modal"
                                                        aria-hidden="true">&times;</a>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <embed
                                                    src="{{ Storage::url('public/raport_semester/' . $item->file_raport) }}"
                                                    type="application/pdf" width="100%" height="600px">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><a
                                                        href="{{ route('progress-santri.index') }}">Tutup</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangani acara klik untuk tautan "Lihat Raport"
            document.querySelectorAll('.open-modal').forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    var targetModal = this.getAttribute('data-target');
                    $(targetModal).modal('show');
                });
            });
        });
    </script>
@endsection
