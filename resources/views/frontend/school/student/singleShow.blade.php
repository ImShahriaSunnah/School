@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
    <div class="row">
        <div class="col-xl-9 mx-auto">               
            <!-- nav-tab -->
            <hr style="width:100%;text-align:left;margin-left:0;margin-bottom:0;height:5px;background-color:#5c84f6">
            <div class="card">
                <div class="card-header">
                
                    <h5 class="card-title"></h5>
                    <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#Profile">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#Fees">Fees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#Result">Result</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#Document">Document</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body tab-content">
                    <div class="tab-pane active" id="Profile">
                        
                        <table class="table table-hover table-bordered"">
                        
                            <tbody >
                                <tr ><td>Student ID </td>
                                <td>{{$user->id}} </td>
                                </tr>
                                <tr ><td>Name </td>
                                <td>{{$user->name}} </td>
                                </tr>
                                <tr ><td>Class </td>
                                <td>{{$user->clasRelation->class_name}}</td>
                                </tr>
                                <tr ><td>Section </td>
                                <td>{{$user->sectionRelation->section_name}}</td>
                                </tr>
                                <tr ><td>Roll </td>
                                <td>{{$user->roll_number}}</td>
                                </tr>
                                <tr ><td>Email </td>
                                <td>{{$user->email}}</td>
                                </tr>
                                <tr ><td>Phone </td>
                                <td>{{$user->phone}}</td>
                                </tr>
                                <tr ><td>Gender </td>
                                <td>{{$user->gender}}</td>
                                </tr>
                                <tr ><td>Date of birth </td>
                                <td>{{$user->dob}}</td>
                                </tr>
                                <tr ><td>Blood group </td>
                                <td>{{$user->blood_group}}</td>
                                </tr>
                                <tr ><td>Father Name </td>
                                <td>{{$user->father_name}}</td>
                                </tr>
                                <tr ><td>Mother Name </td>
                                <td>{{$user->mother_name}}</td>
                                </tr>
                                <tr ><td>Address </td>
                                <td>{{$user->address}}</td>
                                </tr>
                                
                            </tbody>
                            </table>    
                    
                        
                    </div>
                    <!-- Fees -->
                    <div class="tab-pane" id="Fees">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Month</th>
                                    <th>Due Date</th>
                                    <th>Total</th>
                                    <th>Issue Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            
                            <tbody >
                                {{-- @foreach ($data['fees'] as $item)
                                <tr>
                                    <td>{{$item->month_name}} </td>
                                    <td>{{date("d-m-Y", strtotime($item->last_date))}}</td>
                                    <td>{{$item->amount}} </td>
                                    <td>{{date("d-m-Y", strtotime($item->created_at))}}</td>
                                    <td>
                                        @if ($item->status == 0)
                                        <span class="badge bg-danger">{{strtoupper("Unpaid")}}</span>
                                        @elseif($item->status == 1)
                                        <span class="badge bg-primary">{{strtoupper("Under Review")}}</span>
                                        @elseif($item->status == 2)
                                        <span class="badge bg-success">{{strtoupper("Paid")}}</span>
                                        @else
                                        <span class="badge bg-warning">{{strtoupper("none")}}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach --}}
                                <tr>
                                    <td colspan="5">No record found</td>
                                </tr>
                            </tbody>
                        </table>    
                    </div>
                    <div class="tab-pane" id="Result">
                        <h6 style="background-color:#cccfcd;margin:5px;padding:5px">FIRST TERM EXEMINATION RESULT</h6>
                    <table class="table table-hover "">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Written</th>
                                <th>Mcq</th>
                                <th>Practical</th>
                                <th>Total</th>
                                <th>Grade</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        
                        <tbody >
                            <tr>
                                <td colspan="5">No record found</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
                
        </div>
        <div class="col-xl-3 mx-auto">
            <hr style="width:100%;text-align:left;margin-left:0;margin-bottom:0;height:5px;background-color:#5c84f6">
            <div class="card">
                <div class="mt-10">
                    <img class=" shadow-4-strong" style="margin-left:35px; margin-top:20px; border-radius:5px" src="{{asset($user->image)}}" width="170px" alt="img not found">
                    <div style="margin-left:15px; margin-top:10px;">
                        <h6><strong>Name: {{$user->name}} </strong></h6>
                        <h6><strong>SID: {{$user->unique_id}} </strong></h6>
                        <h6><strong>Class: {{$user->clasRelation->class_name}}</strong></h6>
                        <h6><strong>Section: {{$user->sectionRelation->section_name}} </strong></h6>
                        <h6><strong>Roll: {{$user->roll_number}} </strong></h6>
                    </div>
                </div>
            </div>
                                    <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginPassword">
                Change Password
            </button>
            @error('password')<div class="alert alert-danger">{{$message}}</div>@enderror
                   
            {{-- <a href="{{route('example',$user->id)}}" target="_blank" class="btn btn-warning mt-2">Transfer</a> --}}
                             
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
        <form action="{{route('student.Password', $user->id)}}" method="post">
          @method('PUT')
          @csrf
            <div class="mb-3">
              <label for="password" class="col-form-label">New Password</label>
              <input type="text" name="password" class="form-control" id="password" required>
            </div>
            
            <div class="mb-3">
              <label for="password_confirmation" class="col-form-label">Confirm Password</label>
              <input type="text" name="password_confirmation" class="form-control" id="password_confirmation" required>
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



