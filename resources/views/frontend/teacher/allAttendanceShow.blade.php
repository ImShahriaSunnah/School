@extends('layouts.teacher.master')

@section('content')

    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">
            @foreach($data as $key => $s)
               @if(Request::segment(2) == 'attendance')
                @if($s->class_teacher == 1)
{{--                  <div class="col-xl-3 mx-auto">--}}
{{--               <a href="{{route('allAttendance.show.all.teacher',['class_id'=>$s->class_id,'section_id'=>$s->section_id,'group_id'=>is_null($s->group_id) ? 0 :$s->group_id])}}"><div class="card radius-10 mb-0 shadow-none bg-light-purple">--}}
{{--                    <div class="card-body p-4">--}}
{{--                        <div class="text-center">--}}
{{--                            <h5 class="mb-0 text-purple">{{getSubjectNameAll($s->subject_id)->subject_name}}</h5>--}}
{{--                            <p class="mb-0 text-purple">{{ getClassnameUser($s->class_id)->class_name }} , {{getSectionnameUser($s->section_id)->section_name }}  , {{ (!isset($s->group_id)) ? '' : getGroupnameUser($s->group_id)->group_name }}--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                   </div> </a>--}}
{{--            </div>--}}
                        <div class="col">
                            <div class="card radius-10 {{cardColorChange($key)}}">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <p class="mb-1 text-white">{{ getClassnameUser($s->class_id)->class_name }}</p>
                                            <h4 class="mb-0 text-white">{{getSubjectNameAll($s->subject_id)->subject_name}}</h4>
                                        </div>
                                        <div class="ms-auto fs-2 text-white">
                                            <i class="fadeIn animated bx bx-user-voice"></i>
                                        </div>
                                    </div>
                                    <hr class="my-2 border-top border-light">
                                    <small class="mb-0 text-white"><i class="fadeIn animated bx bx-intersect"></i> <span>{{getSectionnameUser($s->section_id)->section_name }}</span></small>
                                    <hr class="my-2 border-top border-light">
                                    <small class="mb-0 text-white"><i class="fadeIn animated bx bx-detail"></i> <span>{{ (!isset($s->group_id)) ? 'No Group' : getGroupnameUser($s->group_id)->group_name ?? '' }}</span></small>
                                    <hr class="my-2 border-top border-light">
                                    <a href="{{route('allAttendance.show.all.teacher',['class_id'=>$s->class_id,'section_id'=>$s->section_id,'group_id'=>is_null($s->group_id) ? 0 :$s->group_id])}}" type="button" class="btn btn-light">See Details</a>
                                </div>
                            </div>
                        </div>
                @endif
               @else
                    <div class="col-xl-3 mx-auto">
                        <a href="{{route('allAttendance.show.all.teacher',['class_id'=>$s->class_id,'section_id'=>$s->section_id,'group_id'=>is_null($s->group_id) ? 0 :$s->group_id])}}"><div class="card radius-10 mb-0 shadow-none bg-light-purple">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="mb-0 text-purple">{{getSubjectNameAll($s->subject_id)->subject_name}}</h5>
                                        <p class="mb-0 text-purple">{{ getClassnameUser($s->class_id)->class_name }} , {{getSectionnameUser($s->section_id)->section_name }}  , {{ (getGroupnameUser($s->group_id)->id == 0 ) ? '' : getGroupnameUser($s->group_id)->group_name ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div> 
                        </a>
                    </div>
                @endif
            @endforeach

            
            
        </div>
    </main>

@endsection
