@extends('layouts.master')

@section('content')

<!--start content-->
<main class="page-content">

<div class="row">
    <div class="col">
    
        <div class="card">
          
            <div style="background-color:#19aa8d; color:white;" class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                    <center><h3 style="margin-top:10px;font-size:50px">{{$school->school_name}}</h3></center>
                    </div>
                  </div>
              
            </div>
            <div class="card-body" style="margin-top:20px ; padding-bottom:30px">
                 <div class="row">
                    <div class="col-lg-12">
                <table class="table table-striped table-bordered  " >
                        <tbody>
                        <tr>
                        <th>school name</th>
                        <td>{{$school->school_name}}</td>
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
                        <td>{{(CountUser($school->id))}}</td>
                        </tr>
                        <tr>
                        <th >Teacher</th>
                        <td>{{(CountTeacher($school->id))}}</td>
                        </tr>
                        <tr>
                        <th >Staff</th>
                        <td>{{(CountStuff($school->id))}}</td>
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
                        <td>{{$school->address}}</td>
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
{{-- <div class="modal fade" id="loginPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> --}}
@endsection 