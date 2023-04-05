<div class="modal" id="attendance-upload-modal" tabindex="-1" aria-label="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Attendance</h3>
            </div>
            <div class="modal-body">
                <form action="{{route('school.attendance.upload')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="" class="form-label">Select File <span class="text-danger"><strong>*</strong></span></label>
                        <input 
                            type="file" 
                            class="form-control" 
                            name="file"
                            required
                        />
                    </div>

                    <button class="btn btn-outline-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
