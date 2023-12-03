<!-- Modal -->
<div class="modal fade" id="detailModal{{ $dataId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog" role="document">
        <form action="{{ route('education.update', $edu->id) }}" method="post">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Data</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exportType">Name Sekolah</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-person"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Nama Sekolah" name="sekolah"
                                value="{{ $edu->sekolah }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exportType">Jurusan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-person"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="jurusan" name="jurusan" required
                                value="{{ $edu->jurusan }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exportType">Tahun Mulai</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-person"></i>
                                </div>
                            </div>
                            <input type="date" class="form-control" placeholder="tahun mulai" name="start" required
                                value="{{ $edu->start }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exportType">Tahun Selesai</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-person"></i>
                                </div>
                            </div>
                            <input type="date" class="form-control" placeholder="tahun selesai" name="end"
                                required value="{{ $edu->end }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exportType">Desc</label>
                        <textarea class="summernote" name="desc" id="desc" cols="30" rows="40">{!! $edu->desc !!}</textarea>
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
