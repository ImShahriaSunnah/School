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
                      <img src="{{asset('/uploads/SchoolLogo/'.$school->school_logo)}}" width="120" class="rounded-circle shadow-8-strong" style="margin-left:50px; margin-top:10px; margin-bottom:8px;" alt="">
                      </div>
                      <div class="col-lg-10">
                      <center><h5 style="font-size:35px">{{$school->school_name}}</h5></center>
                      </div>
                    </div>
                      
                    </div>
                    <div class="card-body" style="margin-top:20px ; padding-bottom:30px">
                         <div class="row">
                            <div class="col-lg-12">
                        <table class="table table-striped " >
                            <tbody>
                                <tr>
                                <th>School Name</th>
                                  <td>{{$school->school_name}}</td>
                                </tr>
                                <th>School Name Bangla</th>
                                  <td>{{$school->school_name_bn ? $school->school_name_bn : ""}}</td>
                                </tr>
                                <tr>
                                <th>Ein Number</th>
                                <td>{{$school->id}}</td>                               
                                </tr>
                                <tr>
                                <th>Email Address</th>
                                <td>{{$school->email}}</td>
                                </tr>
                                <tr>
                                <th>Phone Number</th>
                                <td>{{$school->phone_number}}</td>
                                </tr>
                                <tr>
                                <th >Number of Student</th>
                                <td>1234</td>
                                </tr>
                                <tr>
                                <th >Teacher</th>
                                <td>12</td>
                                </tr>
                                <tr>
                                <th >Staff</th>
                                <td>23</td>
                                </tr>
                                <tr>
                                <th >Change Password</th>
                                <td>
                                <a href="javascript::"  data-bs-toggle="modal" data-bs-target="#loginPassword">
                                                Change Password
                                                </a>
                                                @error('password')<div class="alert alert-danger">{{$message}}</div>
                                                @enderror
                                </td>
                                </tr>
                                <tr>
                                <th >State</th>
                                <td>{{$school->state}}</td>
                                </tr>
                                <tr>
                                <th >city</th>
                                <td>{{$school->city}}</td>
                                </tr>
                                <tr>
                                <th >Postcode</th>
                                <td>{{$school->postcode}}</td>
                                </tr>
                                <tr>
                                <th >Country</th>
                                <td>Bangladesh</td>
                                </tr>
                                <tr>
                                <th >Address</th>
                                <td> {{$school->address}}</td>
                                </tr>
                                <tr>
                                <th >Edit Profile</th>
                                <td><a href="{{route('school.profileEdit',$school->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                                </tr>
                            </tbody>
                        </table>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>

        
    </main>

  <!-- Modal -->
  <div class="modal fade" id="loginPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Student login </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{route('school.Password',$school->id)}}" method="post">
          @method('PUT')
          @csrf
            <div class="mb-3">
              <label for="password" class="col-form-label">New Password</label>
              <input type="text" name="password" class="form-control" id="password">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>

@endsection

