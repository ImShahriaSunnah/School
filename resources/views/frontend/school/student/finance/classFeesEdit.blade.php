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
                            <?php
                            $extra = extraFeesSum(Request::segment(8),$studentFeesEdit->month_name);

                            ?>
                            <hr/>
                                <form class="row g-3" method="post" action="{{route('update.fees.show',$studentFeesEdit->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Pay For {{$studentFeesEdit->month_name}}</label>
                                        <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1">Amount Taka</span>
                                            <input type="text" class="form-control"  name="amount" value="{{ (getClassName( (Request::segment(8)))->class_fees +  $extra ) - $studentFeesEdit->amount}}">
                                            <input type="hidden" class="form-control"  name="student_id" value="{{ Request::segment(7) }}">
                                            <input type="hidden" class="form-control"  name="class_id" value="{{ Request::segment(8) }}">
                                            <input type="hidden" class="form-control"  name="section_id" value="{{ Request::segment(9) }}">
                                            <input type="hidden" class="form-control"  name="group_id" value="{{ Request::segment(10) }}">
                                            <input type="hidden" class="form-control"  name="total" value="{{getClassName(Request::segment(8))->class_fees  +  $extra }}">
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
            <div class="col-xl-6 mx-auto">

                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">Student Monthly Payment Statement</h6>
                            <table class="table table-borderless">
                                <thead>
                                <tr>
                                    <th scope="col">Fees Name</th>
                                    <th scope="col">Fees Amount</th>
                                </tr>
                                <tr>
                                    <td>Monthly Fee</td>
                                    <td>{{getClassName(Request::segment(8))->class_fees}}</td>

                                </tr>
                            @foreach(extraFees(Request::segment(8),$studentFeesEdit->month_name) as $data)
                                <tr>
                                    <td>{{$data->fees_name}}</td>
                                    <td>{{$data->absent}}</td>
                                </tr>
                            @endforeach

                                <tr>
                                    <th scope="col">Total</th>
                                    <th scope="col">{{getClassName(Request::segment(8))->class_fees  +  $extra }}</th>

                                </tr>

                                <tr>

                                        <?php
                                        $payInfo = (  (getClassName( (Request::segment(8)))->class_fees +  $extra )  - $studentFeesEdit->amount ) ;
                                        ?>
                                        @if($payInfo > 0)
                                            <td>Status</td>
                                            <td>Due -> {{ (  (getClassName( (Request::segment(8)))->class_fees +  $extra ) - $studentFeesEdit->amount )  }}</td>

                                            @else
                                            <td>Status</td>
                                            <td>No Due</td>
                                        @endif

                                </tr>
                                </thead>
                            </table>
                            <div class="col-12">
                                <div class="d-grid">

                                    <a href="{{route('pdf.show',['student_id'=>Request::segment(7),'class_id'=>Request::segment(8),'month'=>$studentFeesEdit->month_name,'amount'=>$studentFeesEdit->amount])}}" class="btn btn-primary">Invoice</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </main>

@endsection
