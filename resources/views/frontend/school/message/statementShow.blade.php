@extends('layouts.school.master')

@section('content')
    @push('cs')
        <style>

        </style>
    @endpush
    <!--start content-->
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12">
                <!--end breadcrumb-->
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">{{$classText}}</h5>
                            <div class="ms-auto">
                                <button type="button" class="btn btn-danger" onclick="history.back()">Back</button>
                                <a href="{{route('school.message.usage.show')}}" class="btn btn-primary">Show Message</a>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Package Name</th>
                                    <th>Package Price</th>
                                    <th>Gateway Number</th>
                                    <th>Gateway Type</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($class as $key => $data)
                                    <tr>
                                        <td>{{$key++ +1}}</td>
                                        <td>{{$data->package_name}}</td>
                                        <td>{{$data->package_price}}</td>
                                        <td>{{$data->gateway_number}}</td>
                                        <td>{{$data->gateway_type}}</td>
                                        <td>{{($data->Status == 1) ? 'Paid' : 'Due'}}</td>
                                        <td><a href="{{route('pdf.show.statement',$data->id)}}" class="btn btn-sm btn-danger"><i class="bi bi-printer-fill"></i>Export as PDF</a>
                                        </td>
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
    $tutorialShow = getTutorial('class-show');
    ?>
    @include('frontend.partials.tutorial')
@endsection
@push('js')

@endpush
