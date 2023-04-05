@extends('layouts.master')

@section('content')

    <div class="container mt-5">
        <div class="row  border-bottom white-bg dashboard-header">
            <div class="col-md-12">

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-md-10">
                        <h2>Tutorial</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <strong>Pricing</strong>
                            </li>
                            <li class="breadcrumb-item active">
                                <strong> Edit</strong>
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

                                    <div class="row justify-content-center">
                                        <div class="col-md-12 b-r">
                                            <h3 class="m-t-none m-b">{{ $price->package_name }} Edit</h3>
                                            <form role="form" action="{{ route('messagePackage.update', $price->id) }}" method="POST">
                                                @csrf

                                                <div class="form-group">
                                                    <label>Package Name</label>
                                                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="package_name" value="{{$price->package_name}}">
                                                </div>

                                                <label for="basic-url">Quantity</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="quantity" value="{{$price->quantity}}">
                                                </div>


                                                <label for="basic-url">Price</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="price" value="{{$price->price}}">
                                                </div>

                                                <div>
                                                    <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit">
                                                        <strong>Update</strong>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
