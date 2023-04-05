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
                                <strong>Pricing</strong>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-2">
                        <div class="" style="position: relative; top:20px;">
                            <a href="{{ route('pricing.create') }}" class="btn btn-primary">Create</a>
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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone </th>
                                                <th>Address</th>
                                                <th>Total Teacher</th>
                                                <th>Total Student</th>
                                                <th>Status</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($school as $price)
                                                <tr class="gradeU">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $price->school_name }}</td>
                                                    <td>{{ $price->email }}</td>
                                                    <td>{{ $price->phone_number }}</td>
                                                    <td>{{ $price->address }}</td>
                                                    <td>{{ getSchoolTeacherCount($price->id) }}</td>
                                                    <td>{{ getSchoolStudentCount($price->id) }}</td>
                                                    <td>
                                                        <form  action="{{ route('status.school.update',$price->id) }}" method="POST">
                                                            @csrf
                                                        @if ($price->status ==1)
                                                                <input type="hidden" name="status" value="0">
                                                                <button type="submit" style="border: transparent;"><span class="badge badge-succes">Payment Unblock</span></button>
                                                        @else
                                                                <input type="hidden" name="status" value="1">
                                                                <button type="submit" style="border: transparent;"><span class="badge badge-danger">Payment Block</span></button>
                                                        @endif
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form  action="{{ route('status.school.update',$price->id) }}" method="POST">
                                                            @csrf
                                                        @if ($price->status ==1)
                                                                <input type="hidden" name="status" value="2">
                                                                <button type="submit" style="border: transparent;"><span class="badge badge-succes">Active</span></button>
                                                        @else
                                                                <input type="hidden" name="status" value="1">
                                                                <button type="submit" style="border: transparent;"><span class="badge badge-danger">In-active</span></button>
                                                        @endif
                                                        </form>
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
