@extends('layouts.school.master')

@section('content')
<main class="page-content">
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <hr style="width:100%;text-align:left;margin-left:0;margin-bottom:0;height:5px;background-color:#5c84f6">

            <div class="card">


                <table class="table table-hover table-bordered">

                    <tbody>
                        <tr>
                            <td>Id</td>
                            <td>{{$data->id}} </td>
                        </tr>
                        <tr>
                            <td>Name </td>
                            <td>{{$data->employee_name}} </td>
                        </tr>
                        <tr>
                            <td>Phone </td>
                            <td>{{$data->phone_number}}</td>
                        </tr>
                      
                        <tr>
                            <td>Gender </td>
                            <td>{{$data->gender}}</td>
                        </tr>
                       
                        <tr>
                            <td>Address </td>
                            <td>{{$data->address}}</td>
                        </tr>

                        <tr>
                            <td>Salary </td>
                            <td>{{$data->salary}}</td>
                        </tr>
                       

                    </tbody>
                </table>
            </div>




        </div>
        <div class=" col-xl-3 mx-auto">
            <hr style="width:100%;text-align:left;margin-left:0;margin-bottom:0;height:5px;background-color:#5c84f6">
            <div class="card">
                <div class="mt-10">
                    <div style="margin-left:15px; margin-top:10px;">
                        <center>
                            <img src="{{url('/uploads/employee/'.$data->image)}}" alt="">
                        </center>
                        <br>
                        <h6><strong>Name: {{$data->employee_name}} </strong></h6>
                        <h6><strong>Employee ID: {{$data->employee_id}} </strong></h6>
                        <h6 style="color:red"><strong>Blood Gorup :0+</strong></h6>

                        <h6><strong>Shift:{{$data->shift}}</strong></h6>
                        <h6><strong>Position:{{$data->position}}</strong></h6>


                    </div>
                </div>
            </div>
        </div>
        @endsection