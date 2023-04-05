@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">{{__('app.School Fees')}}</h6>
                            <hr/>
                            @if (session()->has('status'))
                                <span class="text-danger">{{session()->get('status')}}</span>
                            @endif
                            <form action="{{route('school.finance.fees.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input type="text" placeholder="Title of fees" name="title" value="{{old('title')}}" class="form-control" required>
                                        @error('title')
                                            <strong class="text-danger">{{$message}}</strong>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <button class="btn btn-outline-primary">{{__('app.Create')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if($data['fee_types']->count() > 0)
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">  
                            <div class="col-md-12">
                                @include('frontend.layouts.message')
                            </div>

                            <div class="row mb-0">
                                <form action="{{url()->current()}}" id="classForm">
                                    <div class="col-md-6">
                                        <label><b>{{__('app.class')}}</b></label>
                                        <select class="form-control mb-3 js-select" name="class" onchange="document.getElementById('classForm').submit()">
                                            <option value="0" selected>{{__('app.select_class')}}</option>
                                            @foreach($data['classes'] as $class)
                                                <option value="{{$class->id}}" @isset(request()->class) {{(request()->class == $class->id) ? 'selected' : ''}} @endisset >{{$class->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>

                            <hr>

                            <form method="post" action="{{route('school.finance.fees.update')}}">
                                @csrf
                                
                                <div class="row">
                                    <input type="hidden" name="class_id" value="{{ (request()->has('class')) ? request()->class : 0 }}">

                                    @foreach ($data['fee_types'] as $item)
                                    <div class="col-md-6">
                                        <input type="hidden" name="fees_type_id[]" value="{{$item->id}}">
                                        <label for=""><b>{{$item->title}}</b></label>
                                        <div class="input-group mb-2"> 
                                            <span class="input-group-text" id="basic-addon1">৳</span>
                                            <input type="text" class="form-control" placeholder="Amount" name="fees[]" 
                                                @isset(request()->class)
                                                    value="{{getStudentFees(Auth::id(), request()->class, $item->id)?->fees ?? 0}}"
                                                @endisset
                                            />
                                        </div>
                                    </div>
                                    @endforeach
                                </div>         
                                <button class="mt-3 btn btn-outline-primary">{{__('app.save')}}</button>                       
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!--end row-->
    </main>

@endsection