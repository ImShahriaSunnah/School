@extends('layouts.teacher.master')


@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12 mb-5">
               <div class="card">
                   <div class="card-header py-3 bg-transparent">
                       <div class="d-sm-flex align-items-center">
                           <h5 class="mb-2 mb-sm-0">Routine For {{strtoupper(Auth::user()->full_name)}}</h5>
                        </div>
                   </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Day \ Period</th>
                                    @foreach ($data['periods'] as $key => $row)
                                    <th>
                                        {{ordinalNumber(++$key)}} Class <br>
                                        ({{date("h:m A", strtotime($row->from_time)) . " - " . date("h:m A", strtotime($row->to_time))}})
                                    </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rows as $key => $row)
                                    <tr>
                                        <td>{{$key}}</td>
                                        @foreach ($data['periods'] as $key3 => $item)
                                            <td>
                                                @foreach ($row as $key2 => $period)
                                                    @if($item->id == $period->period_id)
                                                        
                                                            {{instituteSubject($period->subject_id)?->subject_name}} <br>
                                                            {{\App\Models\InstituteClass::find($period->class_id)->class_name }}, {{\App\Models\Section::find($period->section_id)->section_name}}<br>
                                                            @if (!is_null($period->note))
                                                                Room No: {{$period->note}}
                                                            @else 
                                                            @endif
                                                        
                                                    @endif
                                                @endforeach
                                            </td>
                                           
                                        @endforeach
                                        
                                    </tr>
                                @empty
                                <tr align="center">
                                    <td colspan="{{count($data['periods'])+1}}">Not Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
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
                        <select name="subject[]"class="form-control mb-3 js-select">\
                            <option value="">Select One</option>\
                            @foreach ($data['subjects'] as $subject)
                            <option value="{{$subject->id}}">{{$subject->name}}</option>\
                            @endforeach\
                        </select>\
                    </div>\
                    <div class="col-lg mb-3">\
                        <label for=""><b>Select Teacher</b><small class="text-danger">*</small></label>\
                        <select  class="form-control mb-3 js-select" name="teacher[]" class="form-select">\
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