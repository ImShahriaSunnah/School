@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">

                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">{{$subjectText}} Form</h6>
                            <hr/>
                            <form class="row g-3" method="post" action="{{route('school.staff.salary.update',$studentFeesEdit->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    
                                    
                                    
                                    <label class="form-label">Pay For {{$studentFeesEdit->month_name}}</label>
                                    <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1">Amount Taka</span>
                                        <input type="hidden" name="employee_phone" value="{{$StaffSalary->phone_number}}">  

                                        <input type="text" class="form-control"  name="amount" value="{{$StaffSalary->salary}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </main>

@endsection
