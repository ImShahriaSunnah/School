@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">

        @if(isset($data))
        <form action="{{route('routine.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for=""><b>{{__('app.Select')}} {{__('app.a')}} {{__('app.Day')}}</b> <small class="text-danger">(* Required)</small> </label>
                <select name="day" class="form-control mb-3 js-select" required>
                    <option value="" selected>Select One</option>
                    <option value="Saturday"> Saturday</option>
                    <option value="Sunday"> Sunday</option>
                    <option value="Monday"> Monday</option>
                    <option value="Tuesday"> Tuesday</option>
                    <option value="Wednesday"> Wednesday</option>
                    <option value="Thursday"> Thursday</option>
                    <option value="Friday"> Friday</option>
                </select>
            </div>

            <input type="hidden" name="class" value="{{$data['class']}}">
            <input type="hidden" name="section" value="{{$data['section']}}">

            <button class="btn-sm btn-primary mb-4" id="add_period" onclick="event.preventDefault();">+ {{__('app.New')}} {{__('app.Period')}}</button>


            <div id="period">
                <div class="row">
                    <div class="col-lg mb-3">
                        <label for=""><b>{{__('app.Starttime')}}</b><small class="text-danger">*</small></label>
                        <div class="input-group">
                            <span class="input-group-text">1</span>
                            <input type="time" name="from_time[]" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-lg mb-3">
                        <label for=""><b>{{__('app.Endtime')}}</b><small class="text-danger">*</small></label>
                        <input type="time" name="to_time[]" class="form-control" required>
                    </div>

                    <div class="col-lg mb-3">
                        <label for=""><b>{{__('app.Select')}} {{__('app.Subject')}}</b><small class="text-danger">*</small></label>
                        <select name="subject[]" class="form-control mb-3 js-select">
                            <option value="">Select One</option>

                            @foreach ($data['subjects'] as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg mb-3">
                        <label for=""><b>{{__('app.Select')}} {{__('app.Teacher')}}</b><small class="text-danger">*</small></label>
                        <select name="teacher[]" class="form-control mb-3 js-select">
                            <option value="">Select One</option>

                            @foreach ($data['teachers'] as $teacher)
                            <option value="{{$teacher->id}}">{{strtoupper($teacher->full_name)}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg mb-3">
                        <label for=""><b>{{__('app.Note')}}</b></label>
                        <input type="text" name="note[]" class="form-control">
                    </div>
                </div>
            </div>

            <button class="btn btn-outline-primary">{{__('app.Save')}}</button>
        </form>

        {{-- @else

        <form action="{{route('routine.store.init')}}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="col-lg mb-3">
                        <label for=""><b>Select Class</b><small class="text-danger">*</small></label>
                        <select name="class"class="form-control mb-3 js-select">
                            <option value="">Select One</option>

                            @foreach ($classes as $class)
                            <option value="{{$class->id}}">{{$class->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg mb-3">
                        <label for=""><b>Select Section</b><small class="text-danger">*</small></label>
                        <select name="section" class="form-control mb-3 js-select">
                            <option value="">Select One</option>
                            @foreach ($sections as $section)
                            <option value="{{$section->id}}">{{$section->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-outline-primary">Set Routine</button>
                </div>
            </div>

        </form> --}}

        @endif


        
    </main>

@endsection

@push('js')

    <script>
        let x = 1;

        $("#add_period").click(function(){
            x++;
            var html = '<div class="row">\
                    <div class="col-lg mb-3">\
                        <label for=""><b>From Time</b><small class="text-danger">*</small></label>\
                        <div class="input-group">\
                            <span class="input-group-text">'+x+'</span>\
                            <input type="time" name="from_time[]" class="form-control" required>\
                        </div>\
                    </div>\
                    <div class="col-lg mb-3">\
                        <label for=""><b>To Time</b><small class="text-danger">*</small></label>\
                        <input type="time" name="to_time[]" class="form-control" required>\
                    </div>\
                    <div class="col-lg mb-3">\
                        <label for=""><b>Select Subject</b><small class="text-danger">*</small></label>\
                        <select name="subject[]" class="form-control mb-3 js-select">\
                            <option value="">Select One</option>\
                            @foreach ($data['subjects'] as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>\
                            @endforeach\
                        </select>\
                    </div>\
                    <div class="col-lg mb-3">\
                        <label for=""><b>{{__('app.Select')}} {{__('app.Teacher')}}</b><small class="text-danger">*</small></label>\
                        <select name="teacher[]" class="form-control mb-3 js-select">\
                            <option value="">Select One</option>\
                            @foreach ($data['teachers'] as $teacher)\
                            <option value="{{$teacher->id}}">{{$teacher->full_name}}</option>\
                            @endforeach\
                        </select>\
                    </div>\
                    <div class="col-lg mb-3">\
                        <label for=""><b>{{__('app.Note')}}</b></label>\
                        <input type="text" name="note[]" class="form-control">\
                    </div>\
                </div>';

            $("#period").append(html);
        })
    </script>
@endpush

