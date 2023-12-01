<!-- Modal -->
<div class="modal fade" id="detailModal{{ $dataId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" style="z-index: 9999">
    <div class="modal-dialog" role="document">
        <form action="{{ route('skill.update', $skill->id) }}" method="post">
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
                        <label for="skillName">Skill Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-hashtag"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="skillName" placeholder="Skill Name"
                                name="name" value="{{ $skill->name }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="skillIcon">Skill Icon</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-hashtag"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="skillIcon" placeholder="Icon Link"
                                name="icon" value="{{ $skill->icon }}" required>
                        </div>
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
