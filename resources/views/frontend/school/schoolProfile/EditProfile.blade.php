@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div style="background-color:#05a5f5; color:white;" class="card-header">
                        <div class="row">
                            <div class="col-lg-2">
                                    <img src="{{asset('/SchoolLogo/'.$school->school_logo)}}" width="120" name="school_logo" class="rounded-circle shadow-8-strong" style="margin-left:50px; margin-top:10px; margin-bottom:8px;" alt="">
                            </div>
                            <div class="col-lg-10">
                                <center><h3 style="margin-top:40px;font-size:50px">{{$school->school_name}}</h3></center>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="margin-top:20px ; padding-bottom:30px">
                         <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-striped " >
                                    <tbody>
                                        <form class="form-group-lg" action="{{route('school.profile.Update', $school->id)}}" method="post" enctype="multipart/form-data" >
                                            @method('PUT')
                                            @csrf
                                            <tr>
                                                <th>School Name</th>
                                                <td> <input value="{{$school->school_name}}" name="school_name" style="border:none;background:none;" class="form-control w-75" type="text" placeholder="Please Input School Name"></td>
                                            </tr>
                                            <tr>
                                                <th>School Name Bangla</th>
                                                <td> <input value="{{$school->school_name_bn ? $school->school_name_bn : ""}}" name="school_name_bn" style="border:none;background:none;" class="form-control w-75" type="text" placeholder="Please Input School Name Bangla"></td>
                                            </tr>
                                        
                                            <tr>
                                                <th>Email Address</th>
                                                <td><input name="email" name="school_name" value="{{$school->email}}" style="border:none;background:none;" class="form-control w-75 " type="text" placeholder="Please Input Email Address"></td>
                                            </tr>

                                            <tr>
                                                <th>Phone Number</th>
                                                <td><input name="phone_number" value="{{$school->phone_number}}" style="border:none;background:none;" class="form-control w-75 " type="text" placeholder="Please Input phone number"></td>
                                            </tr>
                                            
                                            <tr>
                                                <th >State</th>
                                                <td><input name="state" value="{{$school->state}}" style="border:none;background:none;" class="form-control w-75 " type="text" placeholder="Please Input State"></td>
                                            </tr>

                                            <tr>
                                                <th >City</th>
                                                <td><input name="city" value="{{$school->city}}" style="border:none;background:none;" class="form-control w-75 " type="text" placeholder="Please Input City"></td>
                                            </tr>

                                            <tr>
                                                <th >Postcode</th>
                                                <td><input name="postcode" value="{{$school->postcode}}" style="border:none;background:none;" class="form-control w-75 " type="text" placeholder="Please Input postcode"></td>
                                            </tr>

                                            <tr>
                                                <th >Address</th>
                                                <td> <input name="address" value="{{$school->address}}" style="border:none;background:none;" class="form-control w-75 " type="text" placeholder="Please Input Address"></td>
                                            </tr>

                                            <tr>
                                                <th>School Logo</th>
                                                <td><input type="file" name="school_logo" class="form-control">
                                                    @error('school_logo')<div class="alert alert-danger">{{$message}}</div>
                                                    @enderror
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Action</th>
                                                <td><button type="submit" class="btn btn-success btn-sm">Update</button></td>
                                            </tr>

                                        </form>
                                    </tbody>
                                </table>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection


