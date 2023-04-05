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

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Sending Number</th>
                                    <th>{{__('app.date')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($class as $key => $data)
                                    <tr>
                                        <td>{{$key++ +1}}</td>
                                        <td>{{$data->send_number}}</td>
                                        <td>{{$data->created_at}}</td>
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
