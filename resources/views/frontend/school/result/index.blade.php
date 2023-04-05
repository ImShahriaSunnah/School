@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12">
               <div class="card">
                   <div class="card-header py-3 bg-transparent">
                       <div class="d-sm-flex align-items-center">
                           <h5 class="mb-2 mb-sm-0">Class Routine</h5>
                        </div>
                   </div>
                    <div class="card-body">
                        <form action="{{route('routine.show')}}">
                            {{-- @csrf --}}
                            <div class="col-lg mb-3">
                                <label for=""><b>Select Class</b><small class="text-danger">*</small></label>
                                <select name="class" class="form-control mb-3 js-select" required>
                                    <option value="">Select One</option>

                                    @foreach ($classes as $class)
                                    <option value="{{$class->id}}">{{$class->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg mb-3">
                                <label for=""><b>Select Section</b><small class="text-danger">*</small></label>
                                <select name="section" class="form-control mb-3 js-select" required>
                                    <option value="">Select One</option>
                                    @foreach ($sections as $section)
                                    <option value="{{$section->id}}">{{$section->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-outline-primary">Get Routine</button>
                                

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
@endsection