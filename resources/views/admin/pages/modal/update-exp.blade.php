<!-- Modal -->
<div class="modal fade" id="detailModal{{ $dataId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog" role="document">
        <form action="{{ route('experience.update', $exp->id) }}" method="post">
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
                        <label for="exportType">Nama PT</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-person"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Nama Tempat Kerja" name="office" id="office" value="{{$exp->office}}">
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
                            <input type="text" class="form-control" placeholder="Nama jurusan" name="position" id="position" value="{{$exp->position}}">
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
                            <input type="date" class="form-control" name="start" id="start" value="{{$exp->start}}">
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
                            <input type="date" class="form-control" name="end" id="end" value="{{$exp->end}}">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="summernote" name="desc" id="desc" cols="30" rows="40">{!! $exp->desc !!}</textarea>
                    </div>
                
                    <div class="form-group">
                        <label for="type">Jenis</label>
                        <select name="type" id="type" class="form-control">
                            <option value="1" @if ($exp->type==1)
                                selected
                            @endif>Kerja</option>
                            <option value="0" @if ($exp->type==0)
                                selected
                            @endif>Magang</option>
                        </select>
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