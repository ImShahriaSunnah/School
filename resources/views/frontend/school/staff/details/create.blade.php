@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">{{ __('app.STAFF DETAILS CREATE FORM') }}</h6>
                            <hr />
                            @if (!isset($employeeEdit))
                                <form class="row g-3" method="post" action="{{ route('school.staff.List.create.post') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        @include('frontend.layouts.message')
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.EmployeeName') }}</label>
                                        <input type="text" class="form-control" placeholder="Employee Name"
                                            name="employee_name" value="{{old('employee_name')}}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.phone') }}</label>
                                        <input type="text" class="form-control" placeholder="Ex : 01676772959"
                                            name="phone_number" value="{{old('phone_number')}}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.EmployeeId') }}</label>
                                        <input type="text" class="form-control" placeholder="Employee Id"
                                            name="employee_id" value="{{old('employee_id')}}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.Gender') }}</label>
                                        <select class="form-control mb-3 js-select" name="gender" type="text" id="" >
                                            <option value="">{{ __('app.select') }}</option>
                                            <option value="Female" {{(old('gender') == "Female") ? 'selected' : ''}}>{{ __('app.Female') }}</option>
                                            <option value="Male" {{(old('gender') == "Male") ? 'selected' : ''}}>{{ __('app.Male') }}</option>
                                        </select>

                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.image') }}</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label
                                            class="form-label">{{ __('app.PositionName') }}</label>
                                        <select class="form-control mb-3 js-select" aria-label="Default select example"
                                            name="position_name">
                                            @foreach ($position as $data)
                                                <option value="{{ $data->position_name }}" {{(old('position_name') == $data->position_name) ? 'selected' : ''}}>{{ $data->position_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="">{{ __('app.Shift') }}</label>
                                        <select class="form-control mb-3 js-select" name="shift" id="shift">
                                            <option value="Morning" {{(old('shift') == "Morning") ? 'selected' : ''}}>Morning</option>
                                            <option value="Day" {{(old('shift') == "Day") ? 'selected' : ''}}>Day</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.Address') }}</label>
                                        <input type="text" class="form-control" placeholder="Employee Address"
                                            name="address" value="{{old('address')}}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.Salary') }}</label>
                                        <input type="text" class="form-control" placeholder="Employee Salary"
                                            name="salary" value="{{old('salary')}}">
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">{{ __('app.Submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form class="row g-3" method="post"
                                    action="{{ route('school.staff.List.create.update', $employeeEdit->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        @include('frontend.layouts.message')
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.EmployeeName') }}</label>
                                        <input type="text" class="form-control" placeholder="Employee Name"
                                            name="employee_name" value="{{ $employeeEdit->employee_name }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.phone') }}</label>
                                        <input type="text" class="form-control" placeholder="Employee Phone Number"
                                            name="phone_number" value="{{ $employeeEdit->phone_number }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.EmployeeId') }}</label>
                                        <input type="text" class="form-control" placeholder="Employee Id"
                                            name="employee_id" value="{{ $employeeEdit->employee_id }}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.Gender') }}</label>
                                        <select class="form-control mb-3 js-select" name="gender" type="text" id="" >
                                            <option value="">{{ __('app.select') }}</option>
                                            <option value="Female" {{($employeeEdit->gender == "Female") ? 'selected' : ''}}>{{ __('app.Female') }}</option>
                                            <option value="Male" {{($employeeEdit->gender == "Male") ? 'selected' : ''}}>{{ __('app.Male') }}</option>
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.PositionName') }}</label>
                                        <select class="form-select mb-3" aria-label="Default select example"
                                            name="position_name">
                                            @foreach ($position as $data)
                                                <option value="{{ $data->position_name }}"
                                                    {{ $data->position_name == $employeeEdit->position ? 'selected' : '' }}>
                                                    {{ $data->position_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.image') }}</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control" name="image" placeholder="image">
                                            <img src="{{ asset($employeeEdit->image) }}" alt="" width="100">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.Address') }}</label>
                                        <input type="text" class="form-control" placeholder="Employee Address"
                                            name="address" value="{{ $employeeEdit->address }}">
                                    </div>
                                    <div class="col-12">
                                        <label for="">Shift</label>
                                        <select class="form-control mb-3 js-select" name="shift"
                                            id="shift">
                                            <option value="Morning" {{ ($employeeEdit->shift == "Morning") ? 'selected' : '' }}>{{ __('app.morning') }}</option>
                                            <option value="Day" {{ ($employeeEdit->shift == "Day") ? 'selected' : '' }}>{{ __('app.day') }}</option>
                                            <option value="Evening" {{ ($employeeEdit->shift == "Evening") ? 'selected' : '' }}>{{ __('app.evening') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{ __('app.Salary') }}</label>
                                        <input type="text" class="form-control" placeholder="Employee Salary"
                                            name="salary" value="{{ $employeeEdit->salary }}">
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="d-grid">
                                            <button type="submit"
                                                class="btn btn-primary">{{ __('app.Submit') }}</button>
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
