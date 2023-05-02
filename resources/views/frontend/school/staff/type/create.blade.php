@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">

                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">{{ __('app.STAFF INPUT CREATE FORM') }}</h6>
                            <hr />
                            @if (!isset($feesEdit))
                                <form class="row g-3" method="post" action="{{ route('school.staff.create.post') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-md-12">
                                        @include('frontend.layouts.message')
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{__('app.PositionName')}} <span style="color:red;">*</span></label>
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">{{__('app.PositionName')}}</span>
                                            <input type="text" class="form-control" placeholder="{{__('app.PositionName')}}"
                                                name="position_name" value="{{old('position_name')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{__('app.PositionName')}} {{__('app.bangla')}} <span style="color:red;">*</span></label>
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">{{__('app.PositionName')}} {{__('app.bangla')}}</span>
                                            <input type="text" class="form-control" placeholder="{{__('app.PositionName')}} {{__('app.bangla')}}"
                                                name="position_name_bn" value="{{old('position_name_bn')}}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">{{__('app.submit')}}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form class="row g-3" method="post"
                                    action="{{ route('school.staff.update', $feesEdit->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">{{__('app.PositionName')}} <span style="color:red;">*</span></label>
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">{{__('app.PositionName')}}</span>
                                            <input type="text" class="form-control" placeholder="{{__('app.PositionName')}}"
                                                name="position_name" value="{{ $feesEdit->position_name }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{__('app.PositionName')}} {{__('app.bangla')}} <span style="color:red;">*</span></label>
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">{{__('app.PositionName')}} </span>
                                            <input type="text" class="form-control" placeholder="{{__('app.PositionName')}} {{__('app.bangla')}}"
                                                name="position_name_bn" value="{{ $feesEdit->position_name_bn }}">
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