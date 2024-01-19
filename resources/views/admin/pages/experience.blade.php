@extends('admin.layout.app')

@section('title', 'Experience')

@push('style')
    <link rel="stylesheet" href="{{ asset('stisla/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/library/summernote/dist/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengalaman</h1>
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
                                                <th>PT</th>
                                                <th>Posisi</th>
                                                <th>Tahun Mulai</th>
                                                <th>Tahun Selesai</th>
                                                <th>Deskripsi</th>
                                                <th>Tipe</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($exps as $exp)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $no++ }}
                                                    </td>
                                                    <td>
                                                        {{ $exp->office }}
                                                    </td>
                                                    <td>
                                                        {{ $exp->position }}
                                                    </td>
                                                    <td>
                                                        {{ $exp->start }}
                                                    </td>
                                                    <td>
                                                        {{ $exp->end }}
                                                    </td>
                                                    <td>
                                                        {!! $exp->desc !!}
                                                    </td>
                                                    <td>
                                                        @if ($exp->type==1)
                                                            <button class="btn btn-sm btn-primary">Kerja</button>
                                                        @else 
                                                            <button class="btn btn-sm btn-secondary">Magang</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm" title="Edit" data-toggle="modal"
                                                            data-target="#detailModal{{ $exp->id }}"
                                                            data-backdrop="false">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <button class="btn btn-danger btn-sm" title="Delete"
                                                            onclick="confirmDelete('{{ route('experience.destroy', $exp->id) }}')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @include('admin.pages.modal.update-exp', [
                                                    'dataId' => $exp->id,
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
                <form action="{{ route('experience.store') }}" method="post">
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
                                <label for="exportType">Nama PT</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-person"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nama Tempat Kerja" name="office"
                                        id="office" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exportType">Nama Posisi</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-person"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Nama jurusan" name="position"
                                        id="position" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exportType">Tanggal Mulai</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-person"></i>
                                        </div>
                                    </div>
                                    <input type="date" class="form-control" name="start" id="start" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exportType">Tanggal Selesai</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-person"></i>
                                        </div>
                                    </div>
                                    <input type="date" class="form-control" name="end" id="end" >
                                </div>
                                <p class="text-danger">kosongkan jika masih bekerja</p>
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="summernote" name="desc" id="desc" cols="30" rows="40"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="type">Jenis</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="1">Kerja</option>
                                    <option value="0">Magang</option>
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
