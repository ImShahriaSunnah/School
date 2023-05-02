@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">{{ __('app.Class') }} {{ __('app.Routine') }}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('routine.show') }}">
                            {{-- @csrf --}}

                            <div class="col-lg mb-3">
                                <label for=""><b>{{ __('app.Select') }} {{ __('app.shift') }}</b>
                                     <small class="text-danger">*</small></label>

                                <select name="shift" class="form-control mb-3 js-select" required>
                                    <option value="">Select One</option>
                                    <option value="2">Day Shift</option>
                                    <option value="1">Morning Shift</option>
                                    <option value="3">Evening Shift</option>
                                </select>
                            </div>

                            <div class="col-lg mb-3">
                                <label for=""><b>{{ __('app.Select') }} {{ __('app.Class') }}</b> <small
                                        class="text-danger">*</small></label>
                                <select name="class" class="form-control mb-3 js-select" id="class_id" onchange="loadSection()" required>
                                    <option value="">Select One</option>

                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg mb-3">
                                <label for=""><b>{{ __('app.Select') }} {{ __('app.Section') }}</b> <small
                                        class="text-danger">*</small></label>
                                <select name="section" class="form-control mb-3 js-select"id="section_id" required>
                                    <option value="" selected disabled>Select Class First</option>
                                </select>
                            </div>

                            {{-- <div class="mb-3">
                                <label for="">Select Shift</label>
                                    <select name="shift" class="form-control mb-3 js-select" class="form-select" required>
                                    <option value="1" {{ ($row->shift == 1) ? 'selected' : '' }}>Morning Shift</option>
                                    <option value="2" {{ ($row->shift == 2) ? 'selected' : '' }}>Day Shift</option>
                                    <option value="3" {{ ($row->shift == 3) ? 'selected' : '' }}>Evening Shift</option>
                                </select>
                            </div> --}}

                            <button class="btn btn-outline-primary"> {{ __('app.Routine') }} {{ __('app.Show') }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@push('js')
    <script>
        function loadSection() {
            let class_id = $("#class_id").val();

            $.ajax({
                url: '{{ route('admin.show.section') }}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    class_id: class_id
                },

                success: function(response) {
                    // console.log(response.class.class_name);

                    $('#section_id').html(response.html);


                }
            });

        }
    </script>
@endpush
