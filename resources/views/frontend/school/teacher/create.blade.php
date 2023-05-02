@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">{{ __('app.Teacher') }} {{ __('app.Create') }}</h6>
                            <hr />
                            @if (!isset($teacherEdit))
                            <form class="row g-3" method="post" action="{{ route('teacher.create.post') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    @include('frontend.layouts.message')
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('app.Name') }} <span style="color:red;">*</span></label>
                                            <div class="input-group mb-3">
                                                <input type="text" value="{{ old('full_name') }}"
                                                    class="form-control" placeholder="{{ __('app.Name') }}"
                                                    name="full_name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('app.Email') }} <span style="color:red;">*</span></label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control"
                                                    placeholder="{{ __('app.Email') }}" value="{{ old('email') }}"
                                                    name="email" required>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6"><label
                                                class="form-label">{{ __('app.PhoneNumber') }} <span style="color:red;">*</span></label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" value="{{ old('phone') }}"
                                                    name="phone" placeholder="{{ __('app.PhoneNumber') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> <label class="form-label">{{ __('app.sign4') }} <span style="color:red;">*</span></label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" value="{{ old('address') }}"
                                                    name="address" placeholder="{{ __('app.sign4') }}" required>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">{{ __('app.Gender') }} <span style="color:red;">*</span></label>
                                            <select class="form-control mb-3 js-select" value="" name="gender"
                                                type="text" id="" value="{{ old('gender') }}"
                                                class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="Female" {{ (old('gender') == 'Female') ? 'selected' : '' }} >Female</option>
                                                <option value="Male" {{ (old('gender') == 'Male') ? 'selected' : '' }}>Male</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6"><label
                                                class="form-label">{{ __('app.Nationality') }}</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control"
                                                    value="{{ old('Nationality') }}"name="Nationality"
                                                    placeholder="{{ __('app.Bangladeshi') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6"> <label class="form-label">{{ __('app.Image') }}</label>
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control"
                                                name="image"value="{{ old('image') }}"
                                                placeholder="{{ __('app.Image') }}" accept="image/*">
                                            <img src="{{ url('/uploads/teacher') }}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">{{ __('app.Marital') }} <span style="color:red;">*</span></label>
                                            <select class="form-control mb-3 js-select" value="" name="M_status"
                                                type="text" id="" value="{{ old('M_status') }}"
                                                class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="Married" {{ (old('M_status') == 'Married') ? 'selected' : '' }}>Married</option>
                                                <option value="Unmarried" {{ (old('M_status') == 'Unmarried') ? 'selected' : '' }}>Unmarried</option>
                                            </select>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">{{ __('app.Salery') }} <span style="color:red;">*</span>  </label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="salary"
                                                    value="{{ old('salary') }}"
                                                    placeholder="{{ __('app.Salery') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label">{{ __('app.Blood') }}
                                                {{ __('app.Group') }} <span style="color:red;">*</span></label>
                                            <select class="form-control mb-3 js-select" value=""
                                                name="blood_group" type="text" id=""
                                                value="{{ old('blood_group') }}" class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="A+" {{ (old('blood_group') == 'A+') ? 'selected' : '' }}>A+</option>
                                                <option value="A-" {{ (old('blood_group') == 'A-') ? 'selected' : '' }}>A-</option>
                                                <option value="B+" {{ (old('blood_group') == 'B+') ? 'selected' : '' }}>B+</option>
                                                <option value="B-" {{ (old('blood_group') == 'B-') ? 'selected' : '' }}>B-</option>
                                                <option value="O+" {{ (old('blood_group') == 'O+') ? 'selected' : '' }}>O+</option>
                                                <option value="O-" {{ (old('blood_group') == 'O-') ? 'selected' : '' }}>O-</option>
                                                <option value="AB+" {{ (old('blood_group') == 'AB+') ? 'selected' : '' }}>AB+</option>
                                                <option value="AB-" {{ (old('blood_group') == 'AB-') ? 'selected' : '' }}>AB-</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">{{ __('app.Shift')}}  <span style="color:red;">*</span> </label>
                                            <select class="form-control mb-3 js-select" value="" name="shift"
                                                type="text" id="" value="{{ old('shift') }}"
                                                class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="Morning" {{ (old('shift') == 'Morning') ? 'selected' : '' }}>Morning</option>
                                                <option value="Day" {{ (old('shift') == 'Day') ? 'selected' : '' }}>Day</option>
                                                <option value="Evening" {{ (old('shift') == 'Evening') ? 'selected' : '' }}>Evening</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('app.Designation') }} <span style="color:red;">*</span></label>
                                                <input type="text" name="designation"
                                                    value="{{ old('designation') }}" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group mb-3">
                                                <label for="">{{ __('app.Department') }}</label>
                                                <input type="text" name="department_name" class="form-control">
                                            </div>
                                        </div> 

                                        {{-- <div class="col-md-6">
                                            <label for="">{{ __('app.Department') }}</label>

                                            <div class="input-group mb-3">
                                                <select class="form-control mb-3 js-select"
                                                    aria-label="Default select example"
                                                    value="{{ old('department_name') }}" name="department_name">
                                                    <option value="">Select</option>
                                                    @foreach ($department as $data)
                                                        <option value="{{ $data->department_name }}">
                                                            {{ $data->department_name }}</option>
                                                    @endforeach
                                                </select>


                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">{{ __('app.Submit') }}</button>
                                    </div>
                                </div>

                            </form>


                    @else


                        <form class="row g-3" method="post" action="{{ route('teacher.update', $teacherEdit->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                @include('frontend.layouts.message')
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6"> <label class="form-label">{{ __('app.Name') }} <span style="color:red;">*</span></label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control"
                                                placeholder="{{ __('app.Name') }}" name="full_name"
                                                value="{{ $teacherEdit->full_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6"> <label class="form-label">{{ __('app.Email') }} <span style="color:red;">*</span></label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control"
                                                placeholder="{{ __('app.Email') }}" name="email"
                                                value="{{ $teacherEdit->email }}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6"> <label class="form-label">{{ __('app.PhoneNumber') }} <span style="color:red;">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" name="phone"
                                            value="{{ $teacherEdit->phone }}">
                                    </div>
                                </div>

                                <div class="col-md-6"><label class="form-label">{{ __('app.sign4') }} <span style="color:red;">*</span></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="address"
                                            value="{{ $teacherEdit->address }} " placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6"> <label class="form-label">{{ __('app.Nationality') }}</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="Nationality"
                                            value="{{ $teacherEdit->Nationality }}"
                                            placeholder="{{ __('app.Bangladeshi') }}">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <label class="form-label">{{__('app.Gender')}}</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="gender" value="{{$teacherEdit->gender}}" placeholder="">
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('app.Gender') }} <span style="color:red;">*</span></label>
                                    <select class="form-control mb-3 js-select" value="" name="gender"
                                        type="text" id="" class="form-control" required>

                                        <option value="Female"
                                            {{ old('gender', $teacherEdit->gender) == 'Female' ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="Male"
                                            {{ old('gender', $teacherEdit->gender) == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                    </select>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6"> <label class="form-label">{{ __('app.Image') }}</label>
                                    <div class="input-group mb-1 ">
                                        <input type="file" class="form-control " name="image" placeholder="{{ __('app.Image') }}">                                            
                                    </div>
                                    <img width="120px" class="mb-3" src="{{asset($teacherEdit->image)}}" alt="">
                                </div>


                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('app.Marital') }} <span style="color:red;">*</span></label>
                                    <select class="form-control mb-3 js-select" name="M_status" value="">
                                        <option value="Married" {{ old('M_status', $teacherEdit->M_status) == 'Married' ? 'selected' : '' }}>Married</option>
                                        <option value="Unmarried" {{ old('M_status', $teacherEdit->M_status) == 'Unmarried' ? 'selected' : '' }}>Unmarried</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6"> <label class="form-label">{{ __('app.Salery') }}</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="{{ $teacherEdit->salary }}"
                                            name="salary" placeholder="{{ __('app.Salery') }}" required>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                
                                <div class="col-md-6"> <label class="form-label">{{ __('app.Blood') }}
                                        {{ __('app.Group') }} <span style="color:red;">*</span></label>
                                    <select class="form-control mb-3 js-select" value="" name="blood_group"
                                        type="text" id="" class="form-control"
                                        value="{{ $teacherEdit->blood_group }}" placeholder="Ex : o+">
                                        <option value="A+" {{ ($teacherEdit->blood_group == 'A-') ? 'selected' : '' }}>A+</option>
                                        <option value="A-" {{ ($teacherEdit->blood_group == 'A-') ? 'selected' : '' }}>A-</option>
                                        <option value="B+" {{ ($teacherEdit->blood_group == 'B+') ? 'selected' : '' }}>B+</option>
                                        <option value="B-" {{ ($teacherEdit->blood_group == 'B-') ? 'selected' : '' }}>B-</option>
                                        <option value="O+" {{ ($teacherEdit->blood_group == 'O+') ? 'selected' : '' }}>O+</option>
                                        <option value="O-" {{ ($teacherEdit->blood_group == 'O-') ? 'selected' : '' }}>O-</option>
                                        <option value="AB+" {{ ($teacherEdit->blood_group == 'AB+') ? 'selected' : '' }}>AB+</option>
                                        <option value="AB-" {{ ($teacherEdit->blood_group == 'AB-') ? 'selected' : '' }}>AB-</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">{{__('app.Shift')}}</label>
                                    <select class="form-control mb-3 js-select" value="" name="shift" type="text" id="" value="{{old('shift')}}" class="form-control">
                                        <option value="Morning" {{ old('shift', $teacherEdit->shift) == 'Morning' ? 'selected' : '' }}>Morning</option>
                                        <option value="Day" {{ old('shift', $teacherEdit->shift) == 'Day' ? 'selected' : '' }}>Day</option>
                                        <option value="Evening" {{ old('shift', $teacherEdit->shift) == 'Evening' ? 'selected' : '' }}>Evening</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for="">{{ __('app.Designation') }} <span style="color:red;">*</span></label>
                                        <input type="text" name="designation" value="{{ $teacherEdit->designation }}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label for="">{{ __('app.Department') }}</label>
                                        <input type="text" name="department_name" value="{{ $teacherEdit->department_name }}" class="form-control">
                                    </div>
                                </div> 

                                {{-- <div class="col-md-6 ">
                                    <label for="">{{ __('app.Department') }}</label>

                                    <div class="input-group mb-3 mt-2">
                                        <select class="form-control mb-3 js-select" aria-label="Default select example"
                                            name="department_name">
                                            <option value="{{ $teacherEdit->department_name }}" selected>
                                                {{ $teacherEdit->department_name }}</option>
                                            @foreach ($department as $data)
                                                <option value="{{ $data->department_name }}">{{ $data->department_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if (count($department) > 0)
                                        @else
                                            <label class="input-group-text " for="inputGroupSelect02"
                                                style="margin-left: 5px;background-color: transparent;border-color: transparent;text-decoration: underline;">
                                                <span class="badge bg-primary">
                                                    <input type="hidden" name="url_check"
                                                        value="{{ Request::segment(2) . '/' . Request::segment(3) }}">
                                                    <button type="submit"
                                                        style="background-color: transparent;color: #f1f1f1;border-color: transparent;">click
                                                        here</button>
                                                </span>
                                            </label>
                                        @endif
                                    </div>
                                </div> --}}
                            </div>

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