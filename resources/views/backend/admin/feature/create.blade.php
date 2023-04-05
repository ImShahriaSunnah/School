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
                            <li class="breadcrumb-item active">
                                <strong>Tutorial</strong>
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
                                            <h3 class="m-t-none m-b">Feature Menu Create</h3>
                                            <form role="form" action="{{ route('featurePage.store') }}" method="POST">
                                                @csrf

                                                <div class="form-group">
                                                    <label>Menu Name</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="menu_name">
                                                    </div>
                                                </div>
                                                    <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit">
                                                        <strong>Create</strong>
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
