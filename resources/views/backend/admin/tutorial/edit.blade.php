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
                                            <h3 class="m-t-none m-b">{{ $price->name }} Edit</h3>
                                            <form role="form" action="{{ route('tutorial.update', $price->id) }}" method="POST">
                                                @csrf

                                                <div class="form-group">
                                                    <label>Page info</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="page_info">
                                                        <option value="class-show" {{($price->page_info == 'class-show') ? 'selected' : ''}}>class-show</option>
                                                        <option value="section-show" {{($price->page_info == 'section-show') ? 'selected' : ''}}>section-show</option>
                                                        <option value="group-show" {{($price->page_info == 'group-show') ? 'selected' : ''}}>group-show</option>
                                                        <option value="department-show" {{($price->page_info == 'department-show') ? 'selected' : ''}}>department-show</option>
                                                        <option value="subject-show" {{($price->page_info == 'subject-show') ? 'selected' : ''}}>subject-show</option>
                                                        <option value="teacher-show" {{($price->page_info == 'teacher-show') ? 'selected' : ''}}>teacher-show</option>
                                                        <option value="assign-teacher" {{($price->page_info == 'assign-show') ? 'selected' : ''}}>assign-teacher</option>
                                                        <option value="student-show" {{($price->page_info == 'student-show') ? 'selected' : ''}}>student-show</option>
                                                        <option value="attendance-show" {{($price->page_info == 'attendance-show') ? 'selected' : ''}}>attendance-show</option>
                                                        <option value="attendance-show" {{($price->page_info == 'attendance-date-show') ? 'selected' : ''}}>attendance-date-show</option>
                                                        <option value="finance-show" {{($price->page_info == 'finance-show') ? 'selected' : ''}}>finance-show</option>
                                                        <option value="student-fees-show" {{($price->page_info == 'student-fees-show') ? 'selected' : ''}}>student-fees-show</option>
                                                        <option value="staff-salary-show" {{($price->page_info == 'staff-salary-show') ? 'selected' : ''}}>staff-salary-show</option>
                                                        <option value="teacher-salary-show" {{($price->page_info == 'teacher-salary-show') ? 'selected' : ''}}>teacher-salary-show</option>
                                                        <option value="staff-type-show" {{($price->page_info == 'staff-type-show') ? 'selected' : ''}}>staff-type-show</option>
                                                    </select>
                                                </div>

                                                <label for="basic-url">Link</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon3">https://www.youtube.com/watch?v=</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="link" value="{{$price->link}}">
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
