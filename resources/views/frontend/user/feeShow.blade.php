@extends('layouts.user.master')

@section('content')
    <!--start content-->
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12">
                <!--end breadcrumb-->
                <h6 class="mb-0 text-uppercase">{{__('app.Student Payment History')}}</h6>
                <hr/>
                <div class="card">
                    <div class="card-header py-3 bg-transparent">{{__('app.Recent Month')}}</div>
                    <div class="card-body">
                        <div class="text-start">
                        <h5 class="">{{__('app.Month')}}</h5>
                        <p class="mb-0"><p>{{date('F')}}</p>
                        </div>
                        <div class="text-start">
                            <h5 class="">{{__('app.fee')}}</h5>
                            <p class="mb-0"><p>{{ (\App\Models\StudentMonthlyFee::where('student_id', Auth::user()->id)->where('month_name', date('F'))->first()->amount == 0 ) ? 'Due' :   \App\Models\StudentMonthlyFee::where('student_id',Auth::user()->id)->where('month_name',date('F'))->first()->amount    }}</p>
                        </div>
                     </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">{{__('app.Student Pay data Show')}}</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>{{__('app.n')}}</th>
                                    <th>{{__('app.Month')}}</th>
                                    <th>{{__('app.Amount')}}</th>
                                </thead>
                                <tbody>
                                @foreach($showStudent as $key => $data)
                                    <tr>
                                        <td>{{$key++ +1}}</td>
                                        <td>{{$data->month_name }}</td>
                                        <td>{{$data->amount  }}</td>
                                        <td>{{ ($data->amount == 0) ? 'Due' :   'Paid' }}</td>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    $tutorialShow = getTutorial('student-fees-show');
    ?>
    @include('frontend.partials.tutorial')
@endsection
