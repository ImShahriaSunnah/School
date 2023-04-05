@extends('layouts.teacher.master')

@section('content')
    <!--start content-->
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12">
                <!--end breadcrumb-->
                <h6 class="mb-0 text-uppercase">Student Show</h6>
                <hr/>
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">Student Show</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Student Name</th>
                                    <th>Email</th>
                                    <th>Roll Number</th>
                                    <th>Phone</th>
                                    <th>dob</th>
                                    <th>Gender</th>
                                    <th>gender</th>
                                    <th>Blood group</th>
                                    <th>parents_name</th>
                                    <th>address</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($showStudent as $key => $data)
                                    <tr>
                                        <td>{{$key++ +1}}</td>
                                        <td><div class="d-flex align-items-center gap-3 cursor-pointer">
                                            <img src="{{asset('profile/img/'.$data->image)}}" class="rounded-circle" width="44" height="44" alt="">
                                            <div class="">
                                                <p class="mb-0">{{$data->name}}</p>
                                            </div>
                                            </div></td>
                                        <td>{{$data->email }}</td>
                                        <td>{{$data->roll_number  }}</td>
                                        <td>{{$data->phone   }}</td>
                                        <td>{{$data->dob  }}</td>
                                        <td>{{$data->gender  }}</td>
                                        <td>{{$data->blood_group  }}</td>
                                        <td>{{$data->parents_name  }}</td>
                                        <td>{{$data->address  }}</td>

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
    $tutorialShow = getTutorial('student-fees-show');
    ?>
    @include('frontend.partials.tutorial')
@endsection
