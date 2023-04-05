@extends('layouts.master')

@section('content')

    <div class="container mt-5">
        <div class="row  border-bottom white-bg dashboard-header">
            <div class="col-md-12">

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-md-10">
                        <h2>Pricing</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <strong>Tutorial</strong>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-2">
                        <div class="" style="position: relative; top:20px;">
                            <a href="{{ route('messagePackage.create') }}" class="btn btn-primary">Create</a>
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
                                                    <th>Package Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($prices as $price)
                                                    <tr class="gradeU">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $price->package_name }}</td>
                                                        <td>{{ $price->quantity }}</td>
                                                        <td>{{ $price->price }}</td>
                                                        <td>
                                                            <a href="{{ route('messagePackage.edit', $price->id) }}" class="btn btn-warning">Edit</a>
                                                            <a href="{{ route('messagePackage.destroy', $price->id) }}" class="btn btn-danger">Delete</a>
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
                </div>
            </div>
        </div>
    @endsection
