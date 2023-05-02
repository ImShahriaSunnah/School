@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">

                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">{{ __('app.Class') }} {{ __('app.Create') }}</h6>
                            <hr />
                            @if (!isset($classEdit))
                                <form class="row g-3" method="post" action="{{ route('class.create.post') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.Class') }} {{ __('app.Name') }} <span
                                                style="color: red;">*</span></label>
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">{{ __('app.Class') }}</span>
                                            <input type="text" required class="form-control"
                                                placeholder="{{ __('app.Class') }} {{ __('app.Name') }}" name="class_name"
                                                required>
                                        </div>
                                        @error('class_name')<div class="alert alert-danger">{{$message}}</div>@enderror

                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.Class') }} {{ __('app.Name') }}({{__('app.bangla')}}) <span
                                                style="color: red;">*</span></label>
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">{{ __('app.Class') }}</span>
                                            <input type="text" required class="form-control"
                                                placeholder="{{ __('app.Class') }} {{ __('app.Name') }}" name="class_name_bn"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.Class') }} {{ __('app.Fees') }} <span
                                                style="color: red;">*</span></label>
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">{{ __('app.Class') }} {{ __('app.Fees') }} </span>
                                            <input type="number" required class="form-control"
                                                placeholder="{{ __('app.Class') }} {{ __('app.Fees') }}" name="class_fees"
                                                required>
                                        </div>
                                    </div>
                                    {{-- <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="active" value="1">
                                        <label class="form-check-label" for="gridCheck1">
                                            Active
                                        </label>
                                    </div>
                                </div> --}}
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">{{ __('app.Submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form class="row g-3" method="post"
                                    action="{{ route('class.update.post', $classEdit->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.Class') }} {{ __('app.Name') }}</label>
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">{{ __('app.Class') }}</span>
                                            <input type="text" required class="form-control"
                                                placeholder="{{ __('app.Class') }} {{ __('app.Name') }}" name="class_name"
                                                value="{{ substr($classEdit->class_name, 5) }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.Class') }} {{ __('app.Name') }} ({{__('app.bangla')}})</label>
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">{{ __('app.Class') }}</span>
                                            <input type="text"required class="form-control"
                                                placeholder="{{ __('app.Class') }} {{ __('app.Name') }}" name="class_name_bn"
                                               value="{{$classEdit->class_name_bn}}">
                                        </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.Class') }} {{ __('app.Fees') }}</label>
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">{{ __('app.Class') }} {{ __('app.Fees') }}</span>
                                            <input type="number" required class="form-control"
                                                placeholder="{{ __('app.Class') }} {{ __('app.Fees') }}" name="class_fees"
                                                value="{{ $classEdit->class_fees }}">

                                        </div>
                                    </div> 
                                    </div>
                                    {{-- <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="active" value="1"  {{($classEdit->active == 1) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="gridCheck1">
                                            Active
                                        </label>
                                    </div>
                                </div> --}}
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">{{ __('app.Submit') }}</button>
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
