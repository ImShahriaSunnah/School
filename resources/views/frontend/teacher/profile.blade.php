@extends('layouts.teacher.master')

@section('content')

    <main class="page-content">

        {{-- <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center">
            <div class="breadcrumb-title pe-3 text-white">Pages</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt text-white"></i></a>
                        </li>
                        <li class="breadcrumb-item active text-white" aria-current="page">Teacher Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="profile-cover bg-dark"></div> --}}

        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <h5 class="mb-0">My Account</h5>
                        <hr>

                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h6 class="mb-0">TEACHER INFORMATION</h6>
                            </div>

                            <div class="card-body">
                                <form class="row g-3" action="{{route('teacher.account.update',Auth::user()->id)}}" method="post">
                                    @csrf
                                    @include('layouts.teacher.message')
                                    <div class="col-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" value="{{Auth::user()->full_name}}" name="full_name">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Email address</label>
                                        <input type="text" class="form-control" name="email" value="{{Auth::user()->email}}">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Address</label>
                                        <textarea type="text" class="form-control" name="address">{{Auth::user()->address}}</textarea>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Gender</label>
                                        <select  class="form-control mb-3 js-select" class="form-control" name="gender">
                                            <option value="Male" {{ (Auth::user()->gender == 'Male')  ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ (Auth::user()->gender == 'Female')  ? 'selected' : '' }}>Female</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Nationality</label>
                                        <input type="text" class="form-control" name="Nationality" value="{{ Auth::user()->Nationality }}">
                                    </div>

                                    <div class="col-6">
                                        <label class="form-label">Blood Group</label>
                                        <input type="text" class="form-control" name="blood_group" value="{{ Auth::user()->blood_group }}">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">About You</label>
                                        <input type="text" class="form-control" name="about" value="{{ Auth::user()->about }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Department</label>
                                       <select  class="form-control mb-3 js-select" class="form-control" name="department_name">
                                           @foreach(\App\Models\Department::where('school_id',Auth::user()->school_id)->get() as $department)
                                           <option value="{{$department->department_name}}" {{ ($department->department_name == Auth::user()->department_name)  ? 'selected' : '' }}>{{$department->department_name}}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                    <div class="text-start text-center">
                                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="card shadow border-0">
                    <div class="card-body">
                        <h5 class="mb-0">Change Password</h5>
                        <hr>
                        <form class="row g-3" method="post" action="{{route('teacher.change password')}}">
                            @csrf
                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h6 class="mb-0">USER Password</h6>
                            </div>

                            <div class="card-body">

                                    <div class="col-6">
                                        <label class="form-label">Old Password</label>
                                        <input type="text" class="form-control"  name="password" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">New Password</label>
                                        <input type="text" class="form-control"  name="new_password" required>
                                    </div>
                            </div>
                        </div>
                        <div class="text-start">
                            <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card shadow border-0 overflow-hidden">
                    <div class="card-body">
                        <div class="profile-avatar text-center">
                            <img src="https://thesoftking.com/assets/images/user/user.png" class="rounded-circle shadow" width="120" height="120" alt="">
                        </div>

                        <div class="text-center mt-4">
                            {{-- <p class="mb-0 text-secondary">dhaka, Bangladesh</p> --}}
                            <div class="mt-4"></div>
                            <h6 class="mb-1">Status - Teacher</h6>
                            <p class="mb-0 text-secondary">{{getSchoolDataUser(Auth::user()->school_id)->school_name}}</p>
                        </div>
                        <hr>
                        <div class="text-start">
                            <h5 class="">Address</h5>
                            <p class="mb-0"><p>{{Auth::user()->address}}</p>
                        </div>
                    </div>
                    {{-- <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-top">
                            Assignment
                            <span class="badge bg-primary rounded-pill">10</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
                            School Notice
                            <span class="badge bg-primary rounded-pill">3</span>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div><!--end row-->

    </main>

@endsection
