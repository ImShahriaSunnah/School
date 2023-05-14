@extends('layouts.school.master')

@section('content')
<!--start content-->
<!--start content-->
<main class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">{{__('app.Stuff')}} {{__('app.List')}}</h5>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-secondary" onclick="history.back()">{{__('app.back')}}</button>
                            @if(Request::segment(2) != 'staff-salary')
                                <a href="{{route('school.staff.List.create')}}" class="btn btn-primary">{{__('app.staff create')}}</a>
                            @endif
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="lni lni-youtube"></i> Tutorial</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>{{__('app.nong')}}</th>
                                    <th>{{__('app.EmployeeName')}}</th>
                                    <th>{{__('app.Phone')}} </th>
                                    <th>{{__('app.EmployeeId')}} </th>
                                    <th>{{__('app.image')}}</th>
                                    <th>{{__('app.Gender')}}</th>
                                    <th>{{__('app.position')}}</th>
                                    <th>{{__('app.shift')}}</th>
                                    <th>{{__('app.address')}}</th>
                                    <th>{{__('app.Salary')}}</th>
                                    <th>{{__('app.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employee as $key => $data)
                                <tr>
                                    <td>{{$key++ +1}} </td>
                                    <td>
                                        <a href="{{route('staff.view',$data->id)}}" class="text-decoration-none">{{strtoupper($data->employee_name)}}</a>
                                    </td>
                                    <td>{{$data->phone_number}}</td>
                                    <td>{{$data->employee_id}}</td>
                                    <td> 
                                        @if(File::exists(public_path($data->image)) && !is_null($data->image))
                                        <img src="{{asset($data->image)}}" class="rounded-circle" width="44" height="44" alt="">
                                        @else
                                        <img src="{{asset('d/no-img.jpg')}}" class="rounded-circle" width="44" height="44" alt="">
                                        @endif
                                    </td>
                                    <td>{{$data->gender}}</td>
                                    <td>{{strtoupper($data->position)}}</td>
                                    <td>{{$data->shift}}</td>
                                    <td>{{($data->address)}}</td>
                                    <td>{{$data->salary}}</td>
                                    <td>
                                        @if(Request::segment(2) == 'staff-salary')
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="{{route('school.staff.salary.Add',$data->id)}}" class="btn btn-primary">Add Salary</a>
                                            </div>
                                        @else
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a href="{{route('staff.view',$data->id)}}" class="btn btn-primary">View</a>
                                                <a href="{{route('edit.staff.List.school',$data->id)}}" class="btn btn-success">Edit</a>

                                                {{-- <a href="{{route('school.staff.delete',$data->id)}}" class="btn btn-danger">Delete</a>--}}
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$key}}">Delete</button>
                                            </div>
                                        @endif
                                    </td>
                                    <div class="modal fade" id="deleteModal{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete staff</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="get" action="{{route('school.staff.delete',$data->id)}}">
                                                    <div class="modal-body">
                                                        Are you Sure To Delete ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-primary">Yes</button>
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
$tutorialShow = getTutorial('staff-salary-show');
?>
@include('frontend.partials.tutorial')
@endsection