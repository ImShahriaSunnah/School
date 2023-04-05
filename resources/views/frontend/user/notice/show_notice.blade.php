@extends('layouts.user.master')
@section('content')
    <main class="page-content">
        {{-- <div class="row">
            @foreach($subjects as $s)
                <div class="col-md-4 mt-3">
                    <div class="card radius-10 shadow-none border mb-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="project-date">
                                    <p class="mb-0 font-13"></p>
                                </div>
                                <div class="dropdown ms-auto">
                                </div>
                            </div>
                            <div class="text-center my-3">
                                <h6 class="mb-0">
                                    <?php $subject_id = $s->id;
                                        $teacher_id = getAssignTeacherDataAll2($subject_id,Auth::user()->class_id,Auth::user()->section_id);
                                        $teacher = getTeacherNameUser($teacher_id);
                                    ?>
                                    {{ ($teacher == 'NULL') ? 'No Teacher Assign' : $teacher->full_name}}
                                </h6>
                                <p class="mb-0">{{$s->subject_name}}</p>
                            </div>
                            <div class="my-2">
                                <p class="mb-1 font-13">Days go</p>
                                <div class="progress radius-10" style="height:5px;">
                                    <div class="progress-bar bg-orange" role="progressbar" style="width: {{ (  date('d') /cal_days_in_month(CAL_GREGORIAN,date('m'),date('y'))   )*100  }}%"></div>
                                </div>
                                <p class="mb-0 mt-1 font-13 text-end"></p>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="project-user-groups">
                                    @if($teacher == 'NULL')
                                        NO Assignment
                                    @else
                                    <a href="{{route('all.assignment', [$s->id])}}" class="">Assigment
                                       {{ getAssignmentCount2($s->id,$teacher->id) }}</a>
                                   @endif


                                    </a>


                                </div>

                                <div class="py-1 px-3 radius-30 bg-light-orange text-orange ms-auto">
                                    @if($teacher == 'NULL')
                                    @else
                                        <a href="{{route('user.online class',$teacher->id)}}">Join class</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
                </div>
            @endforeach
        </div> --}}
        <div class="row mt-5">
            <div class="col-12 col-lg-12 col-xl-12">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-9">
                                <h5 class="mb-0"> <i class="lni lni-remove-file"></i> Notice Board</h5>
                            </div>
                        </div>
                    </div>
                    <div class="client-message ps ps--active-y">
                        @foreach($showData as $key => $data)
                        <div class="d-flex align-items-center gap-3 client-messages-list border-bottom p-3">
                            <div>
                                <h6 class="mb-0">{{$key++ + 1}}. {{$data['topic']}} <span class="text-secondary mb-0 float-end font-13"> {{ \Carbon\Carbon::parse($data['created_at'])->format('d/m/Y')}}</span></h6>
                                <p class="mb-0 font-13">{{ substr_replace($data['description'], '...', 30) }}</p><br>
                                <span>posted by <a href="#">{{( $data['posted_by'] == 0 ) ? 'School-Admin' : 'Teacher'}}</a> </span><br>
                                <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{$data['id']}}">view</button>
                                <div class="modal fade" id="deleteModal{{$data['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><span><i class="lni lni-remove-file"></i></span>{{$data['topic']}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6 class="mb-0"><img src="https://thesoftking.com/assets/images/user/user.png" class="rounded-circle" width="50" height="50" alt="">
                                                <span style="padding: 2px 2px;">
                                                    <span style="color:blue;">{{( $data['posted_by'] == 0 ) ? 'School-Admin' : 'Teacher'}}</span> -  <span style="font-size: 12px;color: black;">{{ \Carbon\Carbon::parse($data['created_at'])->diffForHumans()}}</span><br>
                                                </span></h6>
                                                {{-- <span>{{ \Carbon\Carbon::parse($data['created_at'])->format('d/m/Y')}}</span> --}}
                                                <p class="abc mt-2">{{$data['description']}}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 565px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 349px;"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @push('js')
        <script>
            new PerfectScrollbar(".client-message")
        </script>
    @endpush

@endsection
