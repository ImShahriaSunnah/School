@extends('layouts.school.master')

@section('content')
<!--start content-->
<main class="page-content">
    <div class="row">
        <div class="col-xl-12 mx-auto">

            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">{{__('app.Teacher')}} {{__('app.Create')}}</h6>
                        <hr />
                        @if(!isset($teacherEdit))
                        <form class="row g-3" method="post" action="{{route('teacher.create.post')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                @include('frontend.layouts.message')
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">{{__('app.Name')}}</label>
                                        <div class="input-group mb-3">
                                            <input type="text" value="{{old('full_name')}}" class="form-control" placeholder="{{__('app.Name')}}" name="full_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">{{__('app.Email')}}</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control"  placeholder="{{__('app.Email')}}" value="{{old('email')}}" name="email" required>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6"><label class="form-label">{{__('app.PhoneNumber')}}</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" value="{{old('phone')}}" name="phone" placeholder="{{__('app.PhoneNumber')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> <label class="form-label">{{__('app.sign4')}}</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" value="{{old('address')}}" name="address" placeholder="{{__('app.sign4')}}" required>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">{{__('app.Gender')}}</label>
                                        <select class="form-control mb-3 js-select" value="" name="gender" type="text" id="" value="{{old('gender')}}" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6"><label class="form-label">{{__('app.Nationality')}}</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control"  value="{{old('Nationality')}}"name="Nationality" placeholder="{{__('app.Nationality')}}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6"> <label class="form-label">{{__('app.Image')}}</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" name="image"value="{{old('image')}}" placeholder="{{__('app.Image')}}">
                                        <img  src="{{url('/uploads/teacher')}}" alt="">
                                    </div>
                                </div>


                            </div>




                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">{{__('app.Marital')}}</label>
                                        <select class="form-control mb-3 js-select" value="" name="M_status" type="text" id="" value="{{old('M_status')}}" class="form-control">
                                            <option value="">Select</option>
                                            <option value="married">Married</option>
                                            <option value="unmarried">Unmarried</option>
                                        </select>
                                    </div>




                                    <div class="col-6">
                                        <label class="form-label">{{__('app.Salery')}}</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="salary" value="{{old('salary')}}" placeholder="{{__('app.Salery')}}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-label">{{__('app.Blood')}} {{__('app.Group')}}</label>
                                        <select class="form-control mb-3 js-select" value="" name="blood_group" type="text" id="" value="{{old('blood_group')}}" class="form-control">
                                            <option value="">Select</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">{{__('app.Shift')}}</label>
                                        <select class="form-control mb-3 js-select" value="" name="shift" type="text" id="" value="{{old('shift')}}" class="form-control">
                                            <option value="">Select</option>
                                            <option value="Morning">Morning</option>
                                            <option value="Day">Day</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group mb-3">
                                            <label for="">{{__('app.Designation')}}</label>
                                            <input type="text" name="designation" value="{{old('designation')}}" class="form-control" required>
                                        </div>
                                    </div>

                                     <div class="col-md-6">
                                    <label for="">{{__('app.Department')}}</label>

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control"value="{{old('department_name')}}" name="department_name">
                                      
                                     
                                
                                    </div>
                                </div>
                            </div>


                                </div>
                            </div>




                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">{{__('app.Submit')}}</button>
                                </div>
                            </div>
                        </form>






                        @else
                        <form class="row g-3" method="post" action="{{route('teacher.update',$teacherEdit->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                @include('frontend.layouts.message')
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6"> <label class="form-label">{{__('app.Name')}}</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="{{__('app.Name')}}" name="full_name" value="{{$teacherEdit->full_name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6"> <label class="form-label">{{__('app.Email')}}</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="{{__('app.Email')}}" name="email" value="{{$teacherEdit->email}}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6"> <label class="form-label">{{__('app.PhoneNumber')}}</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" name="phone" value="{{$teacherEdit->phone}}">
                                    </div>
                                </div>

                                <div class="col-md-6"><label class="form-label">{{__('app.sign4')}}</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="address" value="{{$teacherEdit->address}} " placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6"> <label class="form-label">{{__('app.Nationality')}}</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="Nationality" value="{{$teacherEdit->Nationality}}" placeholder="{{__('app.Nationality')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{__('app.Gender')}}</label>
                                    <select name="gender"class="form-control mb-3 js-select" id="formSelect" >
                                                    <option value="Male"  selected {{ ($teacherEdit->gender == 'Male') ? 'selected' : '' }}>Male</option>
                                                    <option value="Female"  selected {{ ($teacherEdit->gender == 'Female') ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>

                            </div>







                            <div class="row">
                                <div class="col-md-6"> <label class="form-label">{{__('app.Image')}}</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" name="image" placeholder="{{__('app.Image')}}">
                                        <img width="120px" src="{{url('/uploads/teacher',$teacherEdit->image)}}" alt="">
                                    </div>
                                </div>


                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6"> <label class="form-label">{{__('app.Marital')}}</label>
                                    <select name="M_status"class="form-control mb-3 js-select" id="formSelect">
                                    <option value="" selected>Select One</option>
                                    <option value="married" {{ ($teacherEdit->M_status == 'married') ? 'selected' : '' }}>married</option>
                
                                    <option value="unmarried" {{ ($teacherEdit->M_status == 'unmarried') ? 'selected' : '' }}>unmarried</option>
                                                                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">{{__('app.Department')}}</label>

                                    <input type="text" class="form-control" name="department_name" value="{{$teacherEdit->department_name}}" placeholder="{{__('app.Department')}}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6"> <label class="form-label">{{__('app.Salery')}}</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="{{$teacherEdit->salary}}" name="salary" placeholder="{{__('app.Salery')}}">
                                    </div>
                                </div>
                                <div class="col-md-6"> <label class="form-label">{{__('app.Blood')}} {{__('app.Group')}}</label>
                                <select name="blood_group" class="form-control mb-3 js-select" id="formSelect">
                                                    <option value="" selected>Select One</option>
                                                    <option value="A+" {{ ($teacherEdit->blood_group == 'A+') ? 'selected' : '' }}>A+</option>
                                                    <option value="A-" {{ ($teacherEdit->blood_group == 'A-') ? 'selected' : '' }}>A-</option>
                                                    <option value="B+" {{ ($teacherEdit->blood_group == 'B+') ? 'selected' : '' }}>B+</option>
                                                    <option value="B-" {{ ($teacherEdit->blood_group == 'B-') ? 'selected' : '' }}>B-</option>
                                                    <option value="O+" {{ ($teacherEdit->blood_group == 'O+') ? 'selected' : '' }}>O+</option>
                                                    <option value="O-" {{ ($teacherEdit->blood_group == 'O-') ? 'selected' : '' }}>O-</option>
                                                    <option value="AB+" {{ ($teacherEdit->blood_group == 'AB+') ? 'selected' : '' }}>AB+</option>
                                                    <option value="AB-" {{ ($teacherEdit->blood_group == 'AB-') ? 'selected' : '' }}>AB-</option>
                                                </select>
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">{{__('app.Submit')}}</button>
                                    </div>
                                </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</main>

@endsection