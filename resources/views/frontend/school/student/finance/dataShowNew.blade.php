@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Nos</th>
                                    <th>Class Name</th>
                                    <th>Section Name</th>
                                    <th>Group Name</th>
                                    <th>Student Name</th>
                                    <th>Student Phone</th>
                                    <th>Student Roll Number</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataShow as $key => $data)
                                    <tr>
                                        <td>{{$key++ +1}}</td>
                                        <td>{{isset(getClassName($data->class_id)->class_name) ? getClassName($data->class_id)->class_name : 'NO'}}</td>
                                        <td>{{isset(getSectionName($data->section_id)->section_name) ? getSectionName($data->section_id)->section_name : 'NO'}}</td>
                                        <td>{{isset(getGroupname($data->group_id)->group_name) ? getGroupname($data->group_id)->group_name : 'NO'}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->phone}}</td>
                                        <td>{{$data->roll_number}}</td>
                                        <td>
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal{{$data->id}}">Add Fees</button>
                                                <a  href="{{route('add.fees.show',['id'=>$data->id,'class_id'=>$data->class_id,'section_id'=>$data->section_id,'group_id'=>is_null($data->group_id) ? 0 : $data->group_id])}}" class="btn btn-success">All Fees Details</a>

                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="exampleLargeModal{{$data->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Fees Statement </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <?php
                                                $student_id = $data->id;
                                                $studentFeesEdit = \App\Models\StudentMonthlyFee::where('student_id',$data->id)->where('month_name',Request::segment(9))->first();
                                                $extra = extraFeesSum($data->class_id,$studentFeesEdit->month_name);
                                                ?>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="card">
                                                            <div class="card-body">
                                                        <div class="col-md-12">
                                                            <form class="row g-3" method="post" action="{{route('update.fees.show',$studentFeesEdit->id)}}" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="col-md-12">
                                                                    <label class="form-label">Pay For  {{$studentFeesEdit->month_name}}</label>
                                                                    <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1">Amount Taka</span>
                                                                        <input type="text" class="form-control"  name="amount" value="{{ (getClassName( $data->class_id)->class_fees +  $extra ) - $studentFeesEdit->amount}}">
                                                                        <input type="hidden" class="form-control"  name="student_id" value="{{$data->id }}">
                                                                        <input type="hidden" class="form-control"  name="class_id" value="{{  $data->class_id }}">
                                                                        <input type="hidden" class="form-control"  name="section_id" value="{{  $data->section_id }}">
                                                                        <input type="hidden" class="form-control"  name="group_id" value="{{  $data->group_id }}">
                                                                        <input type="hidden" class="form-control"  name="total" value="{{getClassName( $data->class_id)->class_fees  +  $extra }}">
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
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div class="border p-3 rounded">
                                                                        <h6 class="mb-0 text-uppercase">Student Monthly Payment Statement</h6>
                                                                        <div class="modal-body"></div>
                                                                        <div>
                                                                                <p>Monthly Fee   :  <span >{{getClassName($data->class_id)->class_fees}}</span></p>
                                                                        </div>
                                                                        <hr>
                                                                            @foreach(extraFees($data->class_id,$studentFeesEdit->month_name) as $data)
                                                                                <div>
                                                                                    <p>{{$data->fees_name}}   :  <span>{{$data->absent+ $data->absent_after_break+ $data->development}}</span></p>
                                                                                </div>
                                                                                <hr>
                                                                            @endforeach

                                                                            <div>
                                                                                <p scope="col">Total   :  <span>{{getClassName($data->class_id)->class_fees  +  $extra }}</span></p>
                                                                            </div>
                                                                        <hr>
                                                                            <div>

                                                                                <?php
                                                                                $payInfo = (  (getClassName( ($data->class_id))->class_fees +  $extra )  - $studentFeesEdit->amount ) ;
                                                                                ?>
                                                                                @if($payInfo > 0)
                                                                                    <p>Status   :  <span>Due -> {{ (  (getClassName( ($data->class_id))->class_fees +  $extra ) - $studentFeesEdit->amount )  }}</span></p>

                                                                                @else
                                                                                        <p>Status   :  <span>No Due</span></p>
                                                                                @endif

                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="d-grid">

                                                                                <a href="{{route('pdf.show',['student_id'=>$student_id,'class_id'=>$data->class_id,'month'=>$studentFeesEdit->month_name,'amount'=>$studentFeesEdit->amount])}}" class="btn btn-primary">Invoice</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </main>



@endsection
