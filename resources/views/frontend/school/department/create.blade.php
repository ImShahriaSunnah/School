@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">{{$classText}} Form</h6>
                            <hr/>
                            @if(!isset($classEdit))
                            <form class="row g-3" method="post" action="{{route('department.create.post')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    @include('frontend.layouts.message')
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Department Name</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Department name" name="department_name" required>
                                        <input type="hidden" class="form-control"  name="url_check" value="{{$seo_array['urlTeacher']}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="active" value="1">
                                        <label class="form-check-label" for="gridCheck1">
                                            Check me out
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                            @else
                            <form class="row g-3" method="post" action="{{route('department.update.post',$classEdit->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Department Name</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Department name" name="department_name" value="{{(($classEdit->department_name))}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="active" value="1"  {{($classEdit->active == 1) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="gridCheck1">
                                            Check me out
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                           @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </main>

@endsection
