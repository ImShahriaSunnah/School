@extends('layouts.school.master')

@section('content')
<!--start content-->
<main class="page-content">
    
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">{{__('app.Teacher')}} {{__('app.List')}}</h5>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-secondary" onclick="history.back()">{{__('app.Back')}}</button>
                            <a href="{{route('teacher.create')}}" class="btn btn-primary">{{__('app.Teacher')}} {{__('app.Create')}}</a>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{__('app.nong')}}</th>
                                    <th>{{__('app.Teacher')}} {{__('app.Name')}}</th>
                                    <th>{{__('app.Email')}}</th>
                                    <th>{{__('app.Phone')}}</th>
                                    <th>{{__('app.Salery')}}</th>
                                    <th>{{__('app.Blood')}} {{__('app.Group')}}</th>
                                   
                                    @if(Request::segment(2) == 'staff-salary')
                                    @else
                                    <th>{{__('app.Action')}}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teacher as $key => $data)
                                <tr>
                                    <td>{{$key++ +1}}</td>
                                    <td>
                                        @if(File::exists(public_path($data->image)))
                                        <img src="{{asset($data->image)}}" class="rounded-circle" width="44" height="44" alt="">
                                        @else
                                        <img src="{{asset('d/no-img.jpg')}}" class="rounded-circle" width="44" height="44" alt="">
                                        @endif
                                        <a href="{{route('single.view',['id'=>$data->id])}}" class="text-decoration-none ms-2">{{strtoupper($data->full_name)}}</a>
                                    </td>
                                    <td>{{$data->email}}</td>
                                    

                                    <td>{{$data->phone}}</td>
                                    <td>{{$data->salary}}</td>
                                    <td>{{$data->blood_group}}</td>
                                    @if(Request::segment(2) == 'staff-salary')
                                        <td>
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="{{route('single.view',['id'=>$data->id])}}" class="btn btn-primary" >{{__('app.View')}}</a>
                                                <a href="{{route('school.teacher.salary.Add',$data->id)}}" class="btn btn-primary" style="background-color: #1e7e34;color: white">{{__('app.Add')}} {{__('app.Salery')}}</a>
                                            </div>
                                        </td>
                                    @else
                                        <td>
                                            <form method="post" action="{{route('teacher.active',$data->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @if($data->active == 1)
                                                <input type="hidden" name="active" value="0">
                                                <button type="submit" style="border:none;"><span class="badge badge-primary" style="background-color: #1e7e34;color: white">Active</span></button>
                                                @else
                                                <input type="hidden" name="active" value="1">
                                                <button type="submit" style="border:none;"><span class="badge badge-danger" style="background-color: darkred;color: white">In-Active</span></button>
                                                @endif
                                            </form>
                                        </td>
                                    @endif
                                    @if(Request::segment(2) == 'staff-salary')
                                        {{-- <td>
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="{{route('single.view',['id'=>$data->id])}}" class="btn btn-primary">{{__('app.View')}}</a>
                                            </div>
                                        </td> --}}
                                    @else
                                        <td>
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="{{route('single.view',['id'=>$data->id])}}" class="btn btn-primary">{{__('app.View')}}</a>
                                                <a href="{{route('teacher.edit',['id'=>$data->id])}}" class="btn btn-success">{{__('app.Edit')}}</a>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$key}}">{{__('app.delete')}}</button>
                                            </div>
                                        </td>
                                    @endif
                                    {{-- <td>
                                        <div class="btn-group mr-2" role="group" aria-label="First group">
                                            <a href="{{route('single.view',['id'=>$data->id])}}" class="btn btn-primary">{{__('app.View')}}</a>
                                            <a href="{{route('teacher.edit',['id'=>$data->id])}}" class="btn btn-success">{{__('app.Edit')}}</a>
                                            <button class="btn btn-sm btn-danger"
                                            onclick="if(confirm('Are you sure? you are going to delete this record')){ location.replace('/school/teacher/delete/{{$data->id}}'); }">
                                            {{__('app.Delete')}}
                                        </button> 
                                        </div>
                                        
                                      
                                    </td> --}}
                                    
                                    <div class="modal fade" id="deleteModal{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{__('app.teacher')}} {{__('app.delete')}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="get" action="{{route('teacher.delete',['id'=>$data->id])}}">
                                                    <div class="modal-body">
                                                        {{__('app.surecall')}} ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{__('app.no')}}</button>
                                                        <button type="submit" class="btn btn-danger">{{__('app.yes')}}</button>
                                                    </div>
                                                </form>
                                    
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
    </div>
</main>
<?php
$tutorialShow = getTutorial('teacher-show');
?>
@include('frontend.partials.tutorial')



@endsection