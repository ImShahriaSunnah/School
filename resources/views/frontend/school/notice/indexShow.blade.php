@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12">
                <!--end breadcrumb-->
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0"></h5>
                            <div class="ms-auto">
                                <button type="button" class="btn btn-secondary" onclick="history.back()">{{__('app.back')}}</button>
                                <a href="{{route('notice.school.admin.create')}}" class="btn btn-primary">{{__('app.Notice Create')}}</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="lni lni-youtube"></i> Tutorial</button>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>{{__('app.nong')}}</th>
                                    <th>{{__('app.topic')}}</th>
                                    <th width="50%">{{__('app.description')}}</th>
                                    <th>{{__('app.class')}}</th>
                                    <th>{{__('app.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataNotice as $key => $data)
                                    <tr>
                                        <td width="10%">{{$key++ +1}}</td>
                                        <td width="20%">{{$data->topic}}</td>
                                        <td width="50%">{{ substr_replace($data->description, '...', 60) }}</td>
                                        <td width="10%">{{($data->class_id == 0) ? 'All Student' : getClassName($data->class_id)->class_name }}</td>
                                        <td width="10%" class="text-nowrap">
                                            <a href="{{route('notice.delete',$data->id)}}" class="btn btn-danger">{{__('app.delete')}}</a>
                                            
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal{{$data['id']}}">{{__('app.view')}}</button>
                                        </td>
                                        <div class="modal fade" id="deleteModal{{$data['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                                    <div class="modal-content" style="overflow-wrap: break-word !important;">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><span><i class="lni lni-remove-file"></i></span>{{$data['topic']}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6 class="mb-0"><img src="https://thesoftking.com/assets/images/user/user.png" class="rounded-circle" width="50" height="50" alt="">
                                                                <span style="padding: 2px 2px;">
                                                                <span style="color:blue;">{{( $data['posted_by'] == 0 ) ? 'School-Admin' : 'Teacher'}}</span> -  <span style="font-size: 12px;color: black;">{{ \Carbon\Carbon::parse($data['created_at'])->diffForHumans()}}</span><br>
                                                                </span>
                                                            </h6>
                                                            
                                                            {{$data['description']}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{__('app.close')}}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    $tutorialShow = getTutorial('teacher-show');
    ?>
    @include('frontend.partials.tutorial')
@endsection