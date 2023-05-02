@extends('layouts.school.master')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <!--start content-->
    <main class="page-content">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5>{{__('app.Assign Student Fees')}}</h5>
                    </div>
                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        

                        <form action="{{route('school.finance.assign.fees.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md mb-3">
                                    <label for=""><b>{{__('app.Class')}}</b></label>
                                    <select  class="form-control mb-3 js-select"name="class[]" multiple class="js-example-responsive form-control">
                                        <option value=" " disabled="disabled">Select Class</option>

                                        @foreach ($data['classes'] as $class)
                                        <option value="{{$class->id}}">{{$class->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md mb-3">
                                    <label for=""><b>{{__('app.Month')}}</b></label>
                                    <select class="form-control mb-3 js-select" name="month[]" multiple class="js-example-responsive form-control">
                                        <option value=" " disabled="disabled"> Select Month</option>

                                        @foreach ($data['months'] as $key => $month)
                                        <option value="{{$key}}" {{(++$key == date("m"))? "selected" : " "}}> {{$month}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div style="margin-left: 20px; margin-bottom: 20px">
                                @foreach ($data['fee_types'] as $item)
                                    <div class="form-check mb-3">
                                        <input 
                                            class="form-check-input" 
                                            type="checkbox" 
                                            value="{{$item->id}}" 
                                            name="feesTypeId[]"
                                            id="{{Str::camel($item->title)}}"
                                        />
                                        <label class="form-check-label" for="{{Str::camel($item->title)}}">
                                            <b>{{$item->title}}</b>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                            <button type="submit" class="btn-sm btn-outline-primary">{{__('app.save')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
    </main>

@endsection

@push('js')   
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $(".js-example-responsive").select2({});
</script>
@endpush