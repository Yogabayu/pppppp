<!-- Modal -->
<div class="modal fade" id="detailModal{{ $dataId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog" role="document">
        <form action="{{ route('softskill.update', $soft->id) }}" method="post">
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
                        <label for="softortType">Softskill</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-person"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Nama Softskill" name="softskill" id="softskill"
                                value="{{$soft->softskill}}">
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label for="softortType">Ikon (svg code)</label>
                        <div class="input-group">
                            <textarea name="icon" id="icon" cols="30" rows="40" class="form-control" required>{{$soft->icon}}</textarea>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <label>Deskripsi Singkat</label>
                        <textarea class="form-control" name="short_desc" id="short_desc" cols="30" rows="40">{{$soft->short_desc}}</textarea>
                    </div>
                
                    <div class="form-group">
                        <label for="type">Status</label>
                        <select name="is_see" id="is_see" class="form-control">
                            <option value="1" @if ($soft->is_see == 1)
                                selected
                            @endif>Ditampilkan</option>
                            <option value="0" @if ($soft->is_see == 0)
                                selected
                            @endif>Disembunyikan</option>
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