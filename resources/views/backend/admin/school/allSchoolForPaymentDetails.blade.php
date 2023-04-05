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
                                                <th>Status</th>
                                                <th>Payment Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($school as $price)
                                                <tr class="gradeU">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $price->month_name }}</td>
                                                    <td>{{ $price->amount }}</td>
                                                    <td>
                                                        @if ($price->status ==1)
                                                            <p class="badge badge-succes">Active</p>
                                                        @else
                                                            <p class="badge badge-succes">In-active</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form  action="{{ route('checkout.schoolCheckout.update',$price->id) }}" method="POST">
                                                            @csrf
                                                        @if (getSchoolCheckoutTotalSum($price->school_id) >= getSchoolFeesTotalSum($price->school_id))
                                                            @if (getSchoolCheckoutTotalSum($price->school_id) - getSchoolFeesTotalSum($price->school_id) >= workPlaceAdmin($price->school_id,$price->month_id))
                                                                <input type="hidden" name="status" value="1">
                                                                <input type="hidden" name="amount" value="{{workPlaceAdmin($price->school_id,$price->month_id)}}">
                                                                <button type="submit" style="border: transparent;"><span class="badge badge-succes">Block</span></button>
                                                            @else
                                                                <p class="badge badge-succes">Unblock</p>
                                                            @endif
                                                        @else
                                                            <p class="badge badge-succes">Unblock {{getSchoolCheckoutTotalSum($price->school_id)}}</p>
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
