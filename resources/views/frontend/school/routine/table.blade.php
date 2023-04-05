@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12 mb-5">
               <div class="card">
                   <div class="card-header py-3 bg-transparent">
                       <div class="d-sm-flex align-items-center">
                           <h5 class="mb-2 mb-sm-0">{{__('app.Routine')}}  {{instituteClass($data['class'])->class_name}}</h5>
                        </div>
                   </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>{{__('app.Day')}} \ {{__('app.Period')}}</th>
                                    @foreach ($data['periods'] as $key => $row)
                                    <th>
                                        {{ordinalNumber(++$key)." Class"}} <br>
                                        ({{date("h:i a", strtotime($row->from_time)) . " - " . date("h:i a", strtotime($row->to_time))}})
                                        {{-- {{ date('h:i a', strtotime($row->from_time)).' - '. date('h:i a', strtotime($row->to_time)) }} --}}
                                    </th> 
                                    @endforeach
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rows as $key => $row)
                                    <tr>
                                        <td>{{$key}}</td>

                                        @foreach ($row as $period)
                                        <td>
                                            {{instituteSubject($period->subject_id)?->subject_name}} <br>
                                            {{strtoupper( getTeacherName($period->teacher_id)?->full_name)}} <br>
                                            @if (!is_null($period->note))
                                                Room No: {{$period->note}}
                                            @endif
                                        </td>
                                        @endforeach

                                        <td>
                                            <a href="{{url('school/routine/edit?class='.$period->class_id.'&section='.$period->section_id.'&period='.$period->period_id.'&shift='.$period->shift.'&day='.$key)}}" class="btn-sm btn-danger">
                                                <i class="bi bi-pen"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                <tr text-align="center">
                                    <td colspan="{{count($data['periods'])+1}}">Not Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="col-12">
                <div class="card">
                    <div class="card-body">
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
                            <input type="hidden" name="shift" value="{{$data['shift']}}">

                            {{-- <button class="btn-sm btn-primary mb-4" id="add_period" onclick="event.preventDefault();">+ New Period</button> --}}


                            <div id="period">
                                @foreach ($data['periods'] as $item)
                                <div class="row">
                                    <div class="col-lg mb-3">
                                        <label for=""><b>{{__('app.Period')}}</b></label>
                                        <input type="text" value="{{$item->title}}" class="form-control" readonly>
                                    </div>

                                    <input type="hidden" name="period[]" value="{{$item->id}}">

                                    <div class="col-lg mb-3">
                                        <label for=""><b>{{__('app.Select')}} {{__('app.Subject')}}</b><small class="text-danger">*</small></label>
                                        <select name="subject[]" class="form-control mb-3 js-select">
                                            <option value="">Select One</option>

                                            @foreach ($data['subjects'] as $subject)
                                            <option value="{{$subject->id}}">{{$subject->subject_name}}</option>
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
                                        <label for=""><b>{{__('app.RoomNo')}}</b></label>
                                        <input type="text" name="note[]" class="form-control">
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <button class="btn btn-outline-primary">{{__('app.Save')}}</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
    
@endsection

{{-- @push('js')

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
                        <label for=""><b>Select Teacher</b><small class="text-danger">*</small></label>\
                        <select class="form-control mb-3 js-select" name="teacher[]" class="form-select">\
                            <option value="">Select One</option>\
                            @foreach ($data['teachers'] as $teacher)\
                            <option value="{{$teacher->id}}">{{$teacher->full_name}}</option>\
                            @endforeach\
                        </select>\
                    </div>\
                    <div class="col-lg mb-3">\
                        <label for=""><b>Note</b></label>\
                        <input type="text" name="note[]" class="form-control">\
                    </div>\
                </div>';

            $("#period").append(html);
        })
    </script>
@endpush --}}