@extends('admin.layout.app')

@section('title', 'SoftSkill')

@push('style')
    <link rel="stylesheet" href="{{ asset('stisla/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/library/summernote/dist/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/library/datatables/media/css/jquery.dataTables.min.css') }}">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet" />
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Softskill</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a class="ml-2" data-toggle="modal" data-target="#insertModal" data-backdrop="true"
                                    data-keyboard="false">
                                    <button class="btn btn-primary my-3">
                                        <i class="fas fa-file-export"></i> Insert Data
                                    </button>
                                </a>
                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Softskill</th>
                                                <th>Ikon</th>
                                                <th>Deskripsi</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($softs as $soft)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td>
                                                        {{ $soft->softskill }}
                                                    </td>
                                                    <td>
                                                        {!! $soft->icon !!}
                                                    </td>
                                                    <td>
                                                        {{ $soft->short_desc }}
                                                    </td>
                                                    <td>
                                                        @if ($soft->is_see == 1)
                                                            <button class="btn btn-sm btn-success">Ditampilkan</button>
                                                        @else
                                                            <button class="btn btn-sm btn-secondary">Disembunyikan</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm" title="Edit" data-toggle="modal"
                                                            data-target="#detailModal{{ $soft->id }}"
                                                            data-backdrop="false">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <button class="btn btn-danger btn-sm" title="Delete"
                                                            onclick="confirmDelete('{{ route('softskill.destroy', $soft->id) }}')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @include('admin.pages.modal.update-soft', [
                                                    'dataId' => $soft->id,
                                                ])
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" style="z-index: 9999">
            <div class="modal-dialog " role="document">
                <form action="{{ route('softskill.store') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Data</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exportType">Softskill</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-person"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nama Softskill"
                                        name="softskill" id="softskill" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exportType">Ikon (<a href="https://boxicons.com/" target="_blank" rel="noopener noreferrer">bx bx-icon</a>)</label>
                                <div class="input-group">
                                    <textarea name="icon" id="icon" cols="30" rows="40" class="form-control" required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi Singkat</label>
                                <textarea class="form-control" name="short_desc" id="short_desc" cols="30" rows="40"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="type">Status</label>
                                <select name="is_see" id="is_see" class="form-control">
                                    <option value="1">Ditampilkan</option>
                                    <option value="0">Disembunyikan</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script src="{{ asset('stisla/library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('stisla/library/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('stisla/library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('stisla/library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('stisla/library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('stisla/library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('stisla/library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('stisla/library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script>
        "use strict";

        $("#table-1").dataTable({
            columnDefs: [{
                sortable: false,
                targets: []
            }],
        });
    </script>

    <script>
        function confirmDelete(deleteUrl) {
            Swal.fire({
                title: 'Apakah anda yakin menghapus data?',
                text: 'Data yang dihapus tidak dapat dipulihkan',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, lanjutkan !'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If the user clicks "Yes," submit the form
                    var form = document.createElement('form');
                    form.action = deleteUrl;
                    form.method = 'POST';
                    form.style.display = 'none';

                    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    // Append CSRF token to the form
                    var csrfInput = document.createElement('input');
                    csrfInput.name = '_token';
                    csrfInput.value = csrfToken;
                    form.appendChild(csrfInput);

                    // Append a method spoofing input for DELETE request
                    var methodInput = document.createElement('input');
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';
                    form.appendChild(methodInput);

                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>
@endpush
