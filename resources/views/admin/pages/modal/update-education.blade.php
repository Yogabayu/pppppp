<!-- Modal -->
<div class="modal fade" id="detailModal{{ $dataId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog" role="document">
        <form action="{{ route('education.update', $edu->id) }}" method="post">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exportType">Nama Sekolah</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-person"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Nama sekolah" name="sekolah" id="sekolah" value="{{$edu->sekolah}}">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="exportType">Nama Jurusan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-person"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Nama jurusan" name="jurusan" id="jurusan" value="{{$edu->jurusan}}">
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
                            <input type="date" class="form-control" name="start" id="start" value="{{$edu->start}}">
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
                            <input type="date" class="form-control" name="end" id="end" value="{{$edu->end}}">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="summernote" name="desc" id="desc" cols="30" rows="40">{!! $edu->desc !!}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>