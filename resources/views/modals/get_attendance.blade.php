<div class="modal" id="get_attendance" tabindex="-1" aria-label="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Get Attendance</h3>
            </div>
            <div class="modal-body">

                @if(is_null(Auth::user()->device_username) || empty(Auth::user()->device_username))
                <p>Please set fingerprint device information <a href="{{route('device.index')}}">here</a></p>

                @else
                <form action="{{route('device.fetch.log')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">From Date <strong class="text-danger">*</strong></label>
                        <input 
                            class="form-control"
                            name="from_date"
                            type="date"
                            value="{{date("Y-m-d")}}"
                            required
                        />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">To Date <strong class="text-danger">*</strong></label>
                        <input 
                            class="form-control"
                            name="to_date"
                            type="date"
                            value="{{date("Y-m-d")}}"
                            required
                        />
                    </div>

                    <button class="btn btn-outline-primary">GET</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
