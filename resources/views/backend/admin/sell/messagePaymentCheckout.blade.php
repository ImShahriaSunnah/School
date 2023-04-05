@extends('layouts.master')

@section('content')

    <div class="container mt-5">
        <div class="row  border-bottom white-bg dashboard-header">
            <div class="col-md-12">

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-md-10">
                        <h2>Sells Update</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <strong>Message Sells</strong>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-2">
                        <div class="" style="position: relative; top:20px;">
                            <a href="{{ route('tutorial.create') }}" class="btn btn-primary">Create</a>
                        </div>
                    </div>
                </div>

                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">

                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>School Name</th>
                                                <th>Package Name</th>
                                                <th>Package Price</th>
                                                <th>Gateway Type</th>
                                                <th>Sending Number</th>
                                                <th>Transaction Number</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($prices as $price)
                                                <tr class="gradeU">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ getSchoolData($price->school_id)->school_name}}</td>
                                                    <td>{{ $price->package_name }}</td>
                                                    <td>{{ $price->package_price }}</td>
                                                    <td>{{ $price->gateway_type }}</td>
                                                    <td>{{ $price->gateway_number }}</td>
                                                    <td>{{ $price->gateway_number }}</td>
                                                    <td>{{ $price->transaction_number }}</td>
                                                    <td>
                                                    <td><form method="post" action="{{route('confirm.message.payment',$price->id)}}" enctype="multipart/form-data">
                                                            @csrf
                                                            @if($price->status ==1)
                                                                <input type="hidden" name="status" value="0">
                                                                <button type="submit" style="border:none;"><span class="badge badge-primary">Active</span></button>
                                                            @else
                                                                <input type="hidden" name="status" value="0">
                                                                <button type="sunmit" style="border:none;"><span class="badge badge-danger">Inactive</span></button>
                                                            @endif
                                                        </form></td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
