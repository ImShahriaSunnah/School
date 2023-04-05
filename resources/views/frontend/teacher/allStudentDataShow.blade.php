@extends('layouts.teacher.master')

@section('content')
    <style>
        html,body{
            min-height: 100vh;
            min-width: 100vw;
        }
        .parent{
            height: 100vh;
        }
        .parent>.row{
            display: flex;
            align-items: center;
            height: 100%;
        }
        .col img{
            height:100px;
            width: 100%;
            cursor: pointer;
            transition: transform 1s;
            object-fit: cover;
        }
        .col label{
            overflow: hidden;
            position: relative;
        }
        .imgbgchk:checked + label>.tick_container{
            opacity: 1;
        }
        /*         aNIMATION */
        .imgbgchk:checked + label>img{
            transform: scale(1.25);
            opacity: 0.3;
        }
        .tick_container {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            cursor: pointer;
            text-align: center;
        }
        .tick {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            padding: 6px 12px;
            height: 40px;
            width: 40px;
            border-radius: 100%;
        }
    </style>
    <!--start content-->
    <main class="page-content">
{{--        <div class="row">--}}
{{--            <div class="col-md-3"></div>--}}
{{--            <div class="col-md-7">--}}
{{--                <form method="get" action="{{route('allAttendance.show.all.teacher',['class_id'=>$class_id,'section_id'=>$section_id,'group_id'=>is_null($group_id) ? 0 :$group_id])}}" enctype="multipart/form-data">--}}
{{--                    <div class="input-group">--}}
{{--                        <select  class="form-control mb-3 js-select"name="date">--}}
{{--                            <option selected>Choose a month</option>--}}
{{--                            <option value="01">January</option>--}}
{{--                            <option value="02">February</option>--}}
{{--                            <option value="03">March</option>--}}
{{--                            <option value="04">April</option>--}}
{{--                            <option value="05">May</option>--}}
{{--                            <option value="06">June</option>--}}
{{--                            <option value="07">July</option>--}}
{{--                            <option value="08">August</option>--}}
{{--                            <option value="09">September</option>--}}
{{--                            <option value="10">October</option>--}}
{{--                            <option value="11">November</option>--}}
{{--                            <option value="12">December</option>--}}
{{--                        </select>--}}
{{--                        <div class="input-group-append" style="margin-left: 10px">--}}
{{--                            <button type="submit" class="btn btn-outline-secondary">Search</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}

{{--            </div>--}}
{{--        </div>--}}
            <div class="row mt-3">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Student</th>
                                            <th >Roll Number</th>
                                            <th >Email</th>
                                            <th >Phone</th>
                                            <th >Gender</th>
                                            <th >Date of birth</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dataShow as $key => $data)
                                            <tr>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->roll_number}}</td>
                                                <td>{{$data->email}}</td>
                                                <td>{{$data->phone}}</td>
                                                <td>{{$data->gender}}</td>
                                                <td>{{$data->dob}}</td>

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

@endsection


