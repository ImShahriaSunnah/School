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
                                <tr ><td>Roll </td>
                                    <td>{{$user->roll_number}}</td>
                                    </tr>
                                <tr ><td>Class </td>
                                <td>{{$user->clasRelation->class_name}}</td>
                                </tr>
                                <tr ><td>Section </td>
                                <td>{{$user->sectionRelation->section_name}}</td>
                                </tr>
                                <tr ><td>Group </td>
                                <td> @if($user->group_id == 1) Science
                                    @elseif ($user->group_id == 2) Commerce
                                    @elseif ($user->group_id == 3) Humanities
                                    @else 
                                    ----
                                    @endif</td>
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
                                    <th>Amount</th>
                                    <th>Status</th>
                                 
                                </tr>
                            </thead>
                            
                            <tbody >
                                
                            @foreach ($studentMonthlyFees as $studentMonthlyFee)
                                    <tr class="text-center">
                                        <td>{{ $studentMonthlyFee->month_name }}</td>
                                        <td>{{ $studentMonthlyFee->amount }} <svg style="width: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M36 32.2C18.4 30.1 2.4 42.5 .2 60S10.5 93.6 28 95.8l7.9 1c16 2 28 15.6 28 31.8V160H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H64V384c0 53 43 96 96 96h32c106 0 192-86 192-192V256c0-53-43-96-96-96H272c-17.7 0-32 14.3-32 32s14.3 32 32 32h16c17.7 0 32 14.3 32 32v32c0 70.7-57.3 128-128 128H160c-17.7 0-32-14.3-32-32V224h32c17.7 0 32-14.3 32-32s-14.3-32-32-32H128V128.5c0-48.4-36.1-89.3-84.1-95.3l-7.9-1z"/></svg></td>
                                        @if($studentMonthlyFee->status ==2)
                                        <td><button class="btn btn-success"> Paid </button></td>
                                        @else
                                        <td><button class="btn btn-danger">Due</button></td>
                                         @endif
                                    </tr>
                                    @endforeach
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
                    <img class=" shadow-4-strong" style="margin-left:35px; margin-top:20px; border-radius:5px" src="{{asset($user->image ?? 'd/no-img.jpg')}}" width="170px" alt="img not found">
                    {{-- <img class="img-fluid" src="{{ asset($data->image ?? 'd/no-img.jpg') }}" alt="image" width="200px" height="200px"> --}}
                    <div style="margin-left:15px; margin-top:10px;">
                        <h6><strong>Name: {{$user->name}} </strong></h6>
                        <h6><strong>Unique Id: {{$user->unique_id}} </strong></h6>
                        <h6><strong>Class: {{$user->clasRelation->class_name}}</strong></h6>
                        <h6><strong>Section: {{$user->sectionRelation->section_name}} </strong></h6>
                        <h6><strong>Roll: {{$user->roll_number}} </strong></h6>
                    </div>
                </div>
            </div>
                                    <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Change Password
            </button>
            @error('password')<div class="alert alert-danger">{{$message}}</div>@enderror
                   
            <a href="{{route('Transfer',$user->id)}}" target="_blank"  class="btn btn-warning mt-2">Transfer</a>
                             
            </div>
        </div>
    </main>




<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Student login </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" id="addPassword" method="post">
            @csrf
            <input type="hidden" id="id" value="{{$user->id}}">
        <div class="modal-body">
            <div class="errmsgcontainer mb-3">

            </div>
          
            <div class="mb-3">
              <label for="password" class="col-form-label">New Password</label>
              <input type="password" name="password"  class="form-control" id="password" placeholder="{{ __('app.sign5') }}" required >
            </div>
            
            <div class="mb-3">
              <label for="password_confirmation" class="col-form-label">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="{{ __('app.confirm') }} {{ __('app.sign5') }}" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Back</button>
          <button type="submit" class="btn btn-success add_btn">Save</button>
        </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@push('js') 
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    
    <script>
        $(document).ready(function() {
            $(document).on('click', ' .add_btn', function(e) {
                e.preventDefault();
                let id = $('#id').val();
                let password = $('#password').val();
                let password_confirmation = $('#password_confirmation').val();
                //console.log(name+price);
                $.ajax({
                    url: "{{ route('student.Password') }}",
                    method: 'post',
                    data: {
                        id: id,
                        password: password,
                        password_confirmation: password_confirmation
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#addModal').modal('hide');
                            $('#addpassword')[0].reset('hide');
                            location.reload();
                        }
                    },
                    error: function(err) {
                        let error = err.responseJSON;
                        $.each(error.errors, function(index, value) {
                            $('.errmsgcontainer').append('<span class="text-danger">' +
                                value + '</span>' + '<br>')
                        });
                    }
                });
            });
        }); 
    </script>
@endpush 