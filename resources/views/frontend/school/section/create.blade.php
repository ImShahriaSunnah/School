@extends('layouts.school.master')

@section('content')
<!--start content-->
<main class="page-content">
    <div class="row">
        <div class="col-xl-6 mx-auto">

            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">{{$sectionText}} Form</h6>
                        <hr />
                        @if(!isset($sectionEdit))
                        <form class="row g-3" method="post" action="{{route('section.create.post')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <lable>Class Name <span style="color: red;"> *</span></lable>
                                <div class="input-group mb-4">
                                    <select class="form-control mb-3 js-select" required aria-label="Default select example" name="class_id" id="class_id" onchange="game_chf()" required>
                                        @if(count($class) > 0)
                                        <option value="" selected>Class Name </option>
                                        @else
                                        <option value="" selected>No Class Name Selected</option>
                                        @endif

                                        @foreach($class as $data)
                                        <option value="{{$data->id}}">{{$data->class_name}}</option>
                                        @endforeach
                                    </select>
                                    @if(count($class) > 0)
                                    @else
                                    <label class="input-group-text" for="inputGroupSelect02" style="margin-left: 5px;background-color: transparent;border-color: transparent;text-decoration: underline;">
                                        <span class="badge bg-primary">
                                            <input type="hidden" name="url_check_section" value="{{Request::segment(2).'/'.Request::segment(3)}}">
                                            <button type="submit" style="background-color: transparent;color: #f1f1f1;border-color: transparent;">click here</button>
                                        </span>
                                    </label @endif </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Section Name <span style="color: red;"> *</span></label>
                                    <input type="hidden" required class="form-control" name="url_check" value="{{$seo_array['urlTeacher']}}">
                                    <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1">{{__('app.section')}}</span>
                                        <input type="text" class="form-control" placeholder="Section name" name="section_name" required>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                        </form>
                        @else
                        <form class="row g-3" method="post" action="{{route('section.update.post',$sectionEdit->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <lable>Class Name <span style="color: red;"> *</span></lable>
                                </label>

                                <select class="form-control mb-3 js-select" aria-label="Default select example" name="class_id">
                                    <option selected="">Class Name</option>
                                    @foreach($class as $data)
                                    <option value="{{$data->id}}" required {{($data->id == $sectionEdit->class_id) ? 'Selected' : ''}}>{{$data->class_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Section Name  <span style="color: red;"> *</span></label>
                                <div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1">{{__('app.section')}}</span>
                                    <input type="text" required class="form-control" placeholder="Section name" name="section_name" value="{{substr(($sectionEdit->section_name),7)}}">
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