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

                                    <div class="row justify-content-center">
                                        <div class="col-md-12 b-r">
                                            <h3 class="m-t-none m-b">{{ $contactus->subject }} Edit</h3>
                                            <form role="form" action="{{ route('contactus.update', $contactus->id) }}" method="POST">
                                                @csrf
                                            
                                                <div class="form-group">
                                                    <label>Name</label> 
                                                    <input type="text" readonly name="name" value="{{ $contactus->name }}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Email</label> 
                                                    <input type="text" readonly name="email" value="{{ $contactus->email }}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Subject</label> 
                                                    <input type="text" readonly name="subject" value="{{ $contactus->subject }}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>Message</label> 
                                                    <textarea name="message" id="editor1" cols="30" rows="10">{{ $contactus->message }}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Status</label> 
                                                    <select name="status" id=""  class="form-control">
                                                        <option @if ($contactus->status == 1) selected @endif value="1">Active</option>
                                                        <option @if ($contactus->status == 0) selected @endif value="0">In-active</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>SEO Title</label> 
                                                    <input type="text" name="seo_title" value="{{ $contactus->seo_title }}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>SEO Keyword</label> 
                                                    <input type="text" name="seo_keyword" value="{{ $contactus->seo_keyword }}" class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label>SEO Description</label> 
                                                    <textarea name="seo_description" id="editor2" cols="30" rows="10">{{ $contactus->seo_description }}</textarea>
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
