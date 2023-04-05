@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-8 mx-auto">

                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">{{$studentText}} Form</h6>
                            <hr/>
                            @if(!isset($feesEdit))
                                <form class="row g-3" method="post" action="{{route('student.fees.create.post')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        @include('frontend.layouts.message')
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">Class Name</label>
                                            <select class="form-control mb-3 js-select" aria-label="Default select example" name="class_id">
                                                <option value="0" selected>All Student</option>
                                                @foreach(\App\Models\InstituteClass::where('school_id',Auth::user()->id)->get() as $data)
                                                    <option value="{{$data->id}}">{{$data->class_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            <label for=""@class(['p-1', 'font-bold' => true])>Monthly Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="monthly_fee" >
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Absent Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="absent" >
                                            </div>
                                        </div>

                                        
                                        <div class="col-6">
                                            <label for="">Absent After Break</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="absent_after_break" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">First/ Second/ Final Term Exam Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="term_fees" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Exam Center Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="exam_center" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Library/ Lab Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="library" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Sports/ Magazine Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="sport" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Penalty for Late Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="penalty" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Admission Form Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="admission_form" >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Session  Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="session" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Coaching Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="coaching" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Registration Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="registration" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Dairy/ Monogram/ ID/ Tie Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="dairy" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Development Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="development" >
                                            </div>
                                        </div>
                                        
                                        <div class="col-6">
                                            <label for="">Transport Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="transport" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Lok Book/ Syllabus Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="syllabus" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Testimonial Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="testimonial" >
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Scout/ Girls Guide Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="scout" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Study Tour Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="tour" >
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Additional Fees Title</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    {{-- //<i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i> --}}
                                                    <i class="far fa-edit" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Title" name="extra_fees_title" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Additional Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Extra Fees" name="extra_fees">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>



                            @else



                                <form class="row g-3" method="post" action="{{route('student.fees.update',$feesEdit->id)}}" enctype="multipart/form-data">
                                    @csrf


                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">Class Name</label>
                                            <select class="form-control mb-3 js-select" aria-label="Default select example" name="class_id">
                                                <option value="0" selected>All Student</option>
                                                @foreach(\App\Models\InstituteClass::where('school_id',Auth::user()->id)->get() as $data)
                                                {{-- @dd($data) --}}
                                                    <option value="{{$data->id}}" {{$feesEdit->class_id == $data->id ? "selected" : " "}}>{{$data->class_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for=""@class(['p-1', 'font-bold' => true])>Monthly Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="monthly_fee" value="{{$feesEdit->monthly_fee}}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Absent Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="absent" value="{{$feesEdit->absent}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Absent After Break</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="absent_after_break" value="{{$feesEdit->absent_after_break}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">First/ Second/ Final Term Exam Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="term_fees" value="{{$feesEdit->term_fees}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Exam Center Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="exam_center" value="{{$feesEdit->exam_center}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Library/ Lab Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="library" value="{{$feesEdit->library}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Sports/ Magazine Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="sport" value="{{$feesEdit->sport}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Penalty for Late Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="penalty" value="{{$feesEdit->penalty}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Admission Form Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="admission_form" value="{{$feesEdit->admission_form}}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Session  Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="session" value="{{$feesEdit->session}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Coaching Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="coaching" value="{{$feesEdit->coaching}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Registration Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="registration" value="{{$feesEdit->registration}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Dairy/ Monogram/ ID/ Tie Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="dairy" value="{{$feesEdit->dairy}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        
                                        <div class="col-6">
                                            <label for="">Development Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="development" value="{{$feesEdit->development}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Transport Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="transport" value="{{$feesEdit->transport}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Lok Book/ Syllabus Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="syllabus" value="{{$feesEdit->syllabus}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Testimonial Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="testimonial" value="{{$feesEdit->testimonial}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Scout/ Girls Guide Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="scout"  value="{{$feesEdit->scout}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Study Tour Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Amount" name="tour" value="{{$feesEdit->tour}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Additional Fees Title</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="far fa-edit" style="font-size:13px;"></i>
                                                    <i class="fa-solid fa-pen-field" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Title" name="extra_fees_title" value="{{($feesEdit->extra_fees_title == 'null') ? '' : ($feesEdit->extra_fees_title)}}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="">Additional Fees</label>
                                            <div class="input-group mb-2"> 
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa-solid fa-bangladeshi-taka-sign" style="font-size:13px;"></i>
                                                </span>
                                                <input type="text" class="form-control" placeholder="Extra Fees" name="extra_fees" value="{{($feesEdit->extra_fees == '0') ? '' : ($feesEdit->extra_fees)}}"">
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
