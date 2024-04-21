<!-- Modal -->
<div class="modal fade" id="detailModal{{ $dataId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog" role="document">
        <form action="{{ route('project.update', $project->id) }}" method="post" enctype="multipart/form-data">
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
                        <label for="title">Judul</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-person"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="Judul Project" name="title"
                                value="{{ $project->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="short_desc">Deskripsi singkat</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="short_desc" value="{{$project->short_desc}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="long_desc">Deskripsi lengkap</label>
                        <div class="input-group">
                            <textarea name="long_desc" id="long_desc" cols="30" rows="10" class="summernote" required>{!! $project->long_desc !!}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="link">Link project: </label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="link" id="link" value="{{$project->link}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo project: </label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="photo" id="photo"
                                accept=".jpeg, .png, .jpg">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo">Photo project (saat ini): </label>
                        <div class="input-group">
                            <img src="{{ Storage::url('photos/project/'). $project->photo }}" alt="Project Photo" style="max-width: 100px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" @if ($project->status==1)
                                selected
                            @endif>Ditampilkan</option>
                            <option value="0" @if ($project->status==0)
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
