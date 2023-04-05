@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">{{$studentText}}</h5>
                            <div class="ms-auto">
                                <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
                                <a href="{{route('student.fees.create')}}" class="btn btn-primary">Fees Create</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="lni lni-youtube"></i> Tutorial</button>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="card-header">
                        <h5 class="card-title"></h5>
                        <ul class="nav nav-tabs card-header-tabs" data-bs-tabs="tabs">
                            @foreach ($feesclass as $items)
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#{{$items->class_name}}">
                                        {{$items->class_name}}
                                    </a>
                                </li>
                            @endforeach
                            
                            
                        </ul>
                    </div> --}}
                    
                    @foreach ($fees as $item)
                        
                        <div class="card-body" id="#{{$item->class_name}}">
                            <div class="col-md-12 py-2" style="background-color: darkblue; color:white; font-size:16px; text-align:center;">
                                {{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Fees Title</th>
                                        <th>Fees Amount</th>
                                        {{-- <th>{{__('app.class')}}</th> --}}
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr> 
                                            <td>Monthly Fees</td>
                                            <td>{{$item->monthly_fee}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                            
                                        </tr>

                                        <tr> 
                                            <td>Absent Fees</td>
                                            <td>{{$item->absent}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                            
                                        </tr>
                                            
                                        <tr>
                                            <td>Absent After Lunch Fees</td>
                                            <td>{{$item->absent_after_break}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>

                                        <tr>
                                            <td>First/ Second/ Final Term Exam Fees</td>
                                            <td>{{$item->term_fees}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>

                                        <tr>
                                            <td>Exam Center Fees</td>
                                            <td>{{$item->exam_center}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>

                                        <tr>
                                            <td>Library/ Lab Fees</td>
                                            <td>{{$item->library}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>

                                        <tr>
                                            <td>Sports/ Magazine Fees</td>
                                            <td>{{$item->sport}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>

                                        <tr>
                                            <td>Penalty For Late fees (Monthly Unpaid)</td>
                                            <td>{{$item->penalty}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>

                                        <tr>
                                            <td>Admission Form Fees</td>
                                            <td>{{$item->admission_form}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>

                                        <tr>
                                            <td>Session Fees</td>
                                            <td>{{$item->session}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>
                                        
                                        <tr>
                                            <td>Coaching Fees</td>
                                            <td>{{$item->coaching}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>
                                        
                                        <tr>
                                            <td>Registration Fees</td>
                                            <td>{{$item->registration}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>
                                        
                                        <tr>
                                            <td>Dairy/ Monogram/ ID/ Tie Fees</td>
                                            <td>{{$item->development}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>

                                        <tr>
                                            <td>Development Fees</td>
                                            <td>{{$item->development}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>
                                        
                                        
                                        <tr>
                                            <td>Transport Fees</td>
                                            <td>{{$item->transport}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>

                                        <tr>
                                            <td>Lok Book/ Syllabus Fees</td>
                                            <td>{{$item->syllabus}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>

                                        <tr>
                                            <td>Testimonial Fees</td>
                                            <td>{{$item->testimonial}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>

                                        <tr>
                                            <td>Scout/ Girls Guide Fees</td>
                                            <td>{{$item->scout}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>
                                        
                                        <tr>
                                            <td>Study Tour Fees</td>
                                            <td>{{$item->tour}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>
                                        
                                        <tr>
                                            <td>{{($item->extra_fees_title == 'null') ? "Extra Fees Title": ($item->extra_fees_title)}}</td>
                                            <td>{{($item->extra_fees == 'null') ? 0 : ($item->extra_fees)}}</td>
                                            {{-- <td>{{($item->class_id == 0) ? 'All Student' :getClassName($item->class_id)->class_name}}</td> --}}
                                        </tr>

                                        <tr>
                                            <td>
                                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                                    <a  href="{{route('student.fees.edit',$item->id)}}" class="btn btn-success">Edit</a>
                                                    {{-- <button type="button" class="btn btn-danger" fees-bs-toggle="modal" fees-bs-target="#deleteModal{{$key}}">Delete</button> --}}
                                                </div>
                                            </td>
                                            
                                            
                                        </tr>

                                    {{-- @error
                                        <div class="col-12 py-5 text-center">
                                            <tr>
                                                <td colspan="2" style="text-align: center;">No record found</td>
                                            </tr>
                                        </div>
                                    @enderror --}}
                                    </tbody>

                                </table>
                            </div>
                        </div>   
                    @endforeach
                    
                </div>
            </div>
        </div>
    </main>
    <?php
    $tutorialShow = getTutorial('student-fees-show');
    ?>
    @include('frontend.partials.tutorial')
@endsection
