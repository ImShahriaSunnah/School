@extends('layouts.user.master')

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
                <div class="col">
                    <div class="card radius-10 {{cardColorChange($key)}}">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-1 text-white">{{ getClassnameUser(Auth::user()->class_id)->class_name }}</p>
                                    <h4 class="mb-0 text-white">{{$s->subject_name}}</h4>
                                </div>
                                <div class="ms-auto fs-2 text-white">
                                    <i class="fadeIn animated bx bx-group"></i>
                                </div>
                            </div>
                            <hr class="my-2 border-top border-light">
                            <small class="mb-0 text-white"><i class="fadeIn animated bx bx-intersect"></i> <span>{{getSectionnameUser(Auth::user()->section_id)->section_name }}</span></small>
                            <hr class="my-2 border-top border-light">
                            <small class="mb-0 text-white"><i class="fadeIn animated bx bx-detail"></i> <span>{{ (!isset(Auth::user()->group_id)) ? 'No Group' : getGroupnameUser(Auth::user()->group_id)}}</span></small>
                            <hr class="my-2 border-top border-light">
                            <small class="mb-0 text-white" > <span style="font-weight: bold;">Teacher Name :</span> {{ getTeacherNameUser(getAssignTeacherDataAll2($s->id, Auth::user()->class_id, Auth::user()->section_id, Auth::user()->group_id))->full_name ?? 'Not Assigned' }}</small>
                            <small class="mb-0 text-white" > <span style="font-weight: bold;">Teacher Phone :</span> {{ getTeacherNameUser(getAssignTeacherDataAll2($s->id, Auth::user()->class_id, Auth::user()->section_id, Auth::user()->group_id))->phone ?? 'Not Assigned' }}</small>
                            {{-- <hr class="my-2 border-top border-light">
                            <a href="javascript::" type="button" class="btn btn-light">See Result Details</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
