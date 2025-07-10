@extends('admin.layout.app')

@section('title', 'Review')

@push('style')
    <link rel="stylesheet" href="{{ asset('stisla/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/library/summernote/dist/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Review</h1>
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
                                                <th class="text-center">No</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Status</th>
                                                <th>IP Address</th>
                                                <th>Rating</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($reviews->isEmpty())
                                                <tr>
                                                    <td colspan="10" class="text-center">Tidak ada data review</td>
                                                </tr>
                                            @else
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($reviews as $review)
                                                    <tr>
                                                        <td class="text-center">{{ $no++ }}</td>
                                                        <td>
                                                            @if ($review->photo)
                                                                <img src="{{ Storage::url($review->photo) }}"
                                                                    alt="Review Photo" style="max-width: 100px;">
                                                            @else
                                                                <span class="text-muted">-</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $review->name }}</td>
                                                        <td>{{ $review->email }}</td>
                                                        <td>{{ $review->subject }}</td>
                                                        <td>{{ Str::limit($review->message, 50) }}</td>
                                                        <td>
                                                            @if ($review->status)
                                                                <span class="badge badge-success">Ditampilkan</span>
                                                            @else
                                                                <span class="badge badge-secondary">Disembunyikan</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ $review->ip_address }}</td>
                                                        <td>
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $review->rating)
                                                                    <i class="fas fa-star text-warning"></i>
                                                                @else
                                                                    <i class="far fa-star text-warning"></i>
                                                                @endif
                                                            @endfor
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-info btn-sm" title="Edit"
                                                                onclick="openEditModal('{{ $review->id }}', '{{ addslashes($review->name) }}', '{{ addslashes($review->email) }}', '{{ addslashes($review->subject) }}', '{{ addslashes($review->message) }}', '{{ $review->status }}', '{{ $review->rating }}')">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <button class="btn btn-danger btn-sm" title="Delete"
                                                                onclick="confirmDelete('{{ route('review.destroy', $review->id) }}')">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Edit Modal -->
        <div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel"
            aria-hidden="true" style="z-index: 9999">
            <div class="modal-dialog modal-lg" role="document">
                <form action="{{ route('review.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="insertModalLabel">Edit Review</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="edit_name">Name</label>
                                <input type="text" class="form-control" id="edit_name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_email">Email</label>
                                <input type="email" class="form-control" id="edit_email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_subject">Subject</label>
                                <input type="text" class="form-control" id="edit_subject" name="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_message">Message</label>
                                <textarea class="form-control" id="edit_message" name="review" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="edit_photo">Photo (Leave empty if no change)</label>
                                <input type="file" class="form-control" id="edit_photo" name="photo"
                                    accept=".jpeg, .png, .jpg">
                            </div>
                            <div class="form-group">
                                <label for="edit_rating">Rating</label>
                                <select class="form-control" id="edit_rating" name="rating" required>
                                    <option value="1">1 Star</option>
                                    <option value="2">2 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="5">5 Stars</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_status">Status</label>
                                <select class="form-control" id="edit_status" name="status" required>
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Review</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true" style="z-index: 9999">
            <div class="modal-dialog modal-lg" role="document">
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Review</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="edit_name">Name</label>
                                <input type="text" class="form-control" id="edit_name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_email">Email</label>
                                <input type="email" class="form-control" id="edit_email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_subject">Subject</label>
                                <input type="text" class="form-control" id="edit_subject" name="subject" required>
                            </div>
                            <div class="form-group">
                                <label for="edit_message">Message</label>
                                <textarea class="form-control" id="edit_message" name="message" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="edit_photo">Photo (Leave empty if no change)</label>
                                <input type="file" class="form-control" id="edit_photo" name="photo"
                                    accept=".jpeg, .png, .jpg">
                            </div>
                            <div class="form-group">
                                <label for="edit_rating">Rating</label>
                                <select class="form-control" id="edit_rating" name="rating" required>
                                    <option value="1">1 Star</option>
                                    <option value="2">2 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="5">5 Stars</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="edit_status">Status</label>
                                <select class="form-control" id="edit_status" name="status" required>
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Review</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
            aria-hidden="true" style="z-index: 9999">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus review ini?</p>
                        <p class="text-danger">Data yang dihapus tidak dapat dipulihkan.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form id="deleteForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
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

        // Function to open edit modal
        function openEditModal(id, name, email, subject, message, status, rating) {
            $('#edit_name').val(name);
            $('#edit_email').val(email);
            $('#edit_subject').val(subject);
            $('#edit_message').val(message);
            $('#edit_status').val(status);
            $('#edit_rating').val(rating);

            $('#editForm').attr('action', '{{ route('review.update', '') }}/' + id);
            // Show modal
            $('#editModal').modal('show');
        }

        // Function to confirm delete with modal
        function confirmDelete(deleteUrl) {
            $('#deleteForm').attr('action', deleteUrl);
            $('#deleteModal').modal('show');
        }

        // Alternative SweetAlert delete confirmation (commented out the modal version above if you prefer this)
        function confirmDeleteSweetAlert(deleteUrl) {
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
                    var form = document.createElement('form');
                    form.action = deleteUrl;
                    form.method = 'POST';
                    form.style.display = 'none';

                    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    var csrfInput = document.createElement('input');
                    csrfInput.name = '_token';
                    csrfInput.value = csrfToken;
                    form.appendChild(csrfInput);

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
