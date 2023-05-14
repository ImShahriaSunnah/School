@extends('layouts.school.master')

@section('content')





<main class="page-content">
    <div class="row">
        <div class="col mx-auto">
            <div class="card">

            <center>
                    <h3>{{__('app.Syllabus')}} {{__('app.List')}}</h3>
                </center>
                <div class="ms-auto">
                    <a href="{{route('syllabus.create')}}" class="btn btn-primary"> {{__('app.Syllabus')}} {{__('app.Create')}}</a>

                </div>
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase"></h6>
                        <hr />
                        <h4>{{__('app.Class')}} {{__('app.Name')}}</h4>
                        <form class="row g-3" method="post" action="{{route('syllabus.form.post')}}">
                            @csrf
                            
                            <div class="col-12">

                                <select class="form-control mb-3 js-select" aria-label="Default select example" name="select_class" id="select_class">
                                    <option value="">Select Class</option>
                                    @foreach($class as $data)
                                    <option value="{{$data->id}}">{{$data->class_name}}</option>
                                    @endforeach
                                </select>
                                @error('select_form')<div class="alert alert-danger">{{$message}}</div>@enderror

                            </div>
                       

                            <button class="btn btn-primary"> {{__('app.Syllabus')}}</button>
                       

                        </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!--end row-->
</main>


@endsection