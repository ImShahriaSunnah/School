@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">{{__('app.Teacher')}} {{__('app.Create')}}</h6>
                            <hr/>
                            <form class="row g-3" method="post" action="{{route('assign.teacher.create.show.post.data')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    @include('frontend.layouts.message')
                                </div>
                                <div class="col-12">
                                    <div class="col-12">
                                        <label class="form-label">{{__('app.Subject')}} {{__('app.Name')}}</label>
                                        <select  class="form-control mb-3 js-select" aria-label="Default select example" name="subject_id" id="subject_id" required>
                                            <option value="" selected>Subject Name</option>
                                            @foreach($dataSubject as $data)
                                                <option value="{{$data->id}}" {{($data->id == $dataEdit->subject_id) ? 'selected' : ''}}>{{$data->subject_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{__('app.Teacher')}} {{__('app.Name')}}</label>
                                        <select  class="form-control mb-3 js-select" aria-label="Default select example" name="teacher_id" id="teacher_id" required>
                                            <option value="" selected>Teacher Name</option>
                                            @foreach($dataTeacher as $data)
                                                <option value="{{$data->id}}" {{($data->id == $dataEdit->teacher_id) ? 'selected' : ''}}>{{$data->full_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="hidden" class="form-control"   name="class_id" value="{{$dataEdit->class_id}}">
                                        <input type="hidden" class="form-control"  name="section_id" value="{{$dataEdit->section_id}}">
                                        <input type="hidden" class="form-control"   name="group_id" value="{{$dataEdit->group_id}}">
                                        <input type="hidden" class="form-control"   name="id" value="{{$dataEdit->id}}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="active" value="1" {{($dataEdit->class_teacher == 1) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="gridCheck1">
                                            {{__('app.Class')}} {{__('app.Teacher')}}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">{{__('app.Submit')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection