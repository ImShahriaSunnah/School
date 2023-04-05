@extends('layouts.master')

@section('content')

    <div class="container mt-5">
        <div class="row  border-bottom white-bg dashboard-header">
            <div class="col-md-12">

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-md-10">
                        <h2>Contact us</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <strong>Contact us</strong>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-2">

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
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Subject</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>    
                                                @foreach ($contactuss as $contactus)
                                                    <tr class="gradeU">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $contactus->name }}</td>
                                                        <td>{{ $contactus->email }}</td>
                                                        <td>{{ $contactus->subject }}</td>
                                                        <td>
                                                            @if ($contactus->status ==1)
                                                                <p class="badge badge-succes">Active</p>
                                                            @else
                                                                <p class="badge badge-succes">In-active</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('contactus.edit', $contactus->id) }}" class="btn btn-warning">Edit</a>
                                                            <a href="{{ route('contactus.destroy', $contactus->id) }}" class="btn btn-danger">Delete</a>
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
