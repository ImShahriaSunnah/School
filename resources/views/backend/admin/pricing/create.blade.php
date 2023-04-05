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

                    </div>
                </div>

                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-content">

                                    <div class="row justify-content-center">
                                        <div class="col-md-12 b-r">
                                            <h3 class="m-t-none m-b">Pricing Create</h3>
                                            <form role="form" action="{{ route('pricing.store') }}" method="POST">
                                                @csrf

                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" name="name" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" name="title" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <input type="text" name="price" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Button Text</label>
                                                    <input type="text" name="button_text" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Student</label>
                                                    <input type="text" name="student" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Teachers</label>
                                                    <input type="text" name="teachers" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Message</label>
                                                    <input type="text" name="message" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" id="editor1" cols="30" rows="10"></textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select name="status" id=""  class="form-control">
                                                        <option value="1">Active</option>
                                                        <option value="0">In-active</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>SEO Title</label>
                                                    <input type="text" name="seo_title" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>SEO Keyword</label>
                                                    <input type="text" name="seo_keyword" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>SEO Description</label>
                                                    <textarea name="seo_description" id="editor2" cols="30" rows="10"></textarea>
                                                </div>

                                                <div>
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
