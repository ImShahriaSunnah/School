@extends('layouts.school.master')

@push('css')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

@endpush

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            @if(!isset($studentEdit))
                                <h6 class="mb-0 text-uppercase">{{__('app.Student')}} {{__('app.Information')}}</h6>
                            @else 
                                <h6 class="mb-0 text-uppercase">{{__('app.Student')}} {{__('app.Information')}} {{__('app.Update')}}</h6>
                            @endif
                            
                            @if(!is_null(Auth::user()->zk_ip_address) && !is_null(Auth::user()->zk_ip_port))
                            <strong class="text-danger" style="margin-top: 20px">
                                * {{__('app.Ensuretitle')}} *
                            </strong>
                            @endif
                            <hr/>

                            @if(!isset($studentEdit))
                                <form class="row g-3" method="post" action="{{route('student.create.post')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        @include('frontend.layouts.message')
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{__('app.Student')}} {{__('app.Name')}} <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" placeholder="{{__('app.Student')}} {{__('app.Name')}}" name="name" value="{{ old('name') }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>{{__('app.RollNumber')}} <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" placeholder="{{__('app.RollNumber')}}" name="roll_number" value="{{ old('roll_number') }}" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{__('app.Email')}} <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" placeholder="{{__('app.Email')}}" name="email" value="{{ old('email') }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>{{__('app.PhoneNumber')}} <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" placeholder="{{__('app.PhoneNumber')}}" name="phone" value="{{ old('phone') }}" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{__('app.Gender')}} <span style="color:red;">*</span>:</label>

                                                    <input type="radio" id="Male" name="gender" value="Male"
                                                           checked required>
                                                    <label for="huey">Male</label>

                                                 <input type="radio" id="Female" name="gender" value="Female"
                                                    {{(old('gender') == 'Female') ? 'checked' : ''}}>
                                                    <label for="dewey">Female</label>

                                            </div>
                                            <div class="col-md-6">
                                                <label>{{__('app.Birth')}} </label>                                               
                                                <input type="date" id="datepicker" class="form-control" placeholder="YYYY-MM-DD"
                                                name="dob" @if(!empty(old('dob'))) value="{{ date('Y-m-d', strtotime(old('dob'))) }}" @endif>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{__('app.Blood')}} {{__('app.Group')}}</label>
                                                
                                                <select name="blood_group" class="form-control mb-3 js-select" id="formSelect">
                                                    <option value="" selected>Select One</option>
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


                                            <div class="col-md-6">
                                                <label>{{__('app.Shift')}}</label>
                                                <select class="form-control mb-3 js-select" name="shift" required>
                                                    <option value="" selected>Select One</option>
                                                    <option value="1">Morning</option>
                                                    <option value="2" >Day</option>
                                                    <option value="3">Evening</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md">
                                                <label>{{__('app.Class')}} <span style="color:red;">*</span></label>
                                                <select class="form-control mb-3 js-select" aria-label="Default select example" name="class_id" id="class_id" onchange="loadSection()" required>
                                                    <option selected="">Class Name</option>
                                                    @foreach($class as $data)
                                                        <option value="{{$data->id}}" {{ (old('class_id') == $data->id) ? 'selected' : ''}}>{{$data->class_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md">
                                                <label>{{__('app.Section')}} {{__('app.Name')}} <span style="color:red;">*</span></label>
                                                <select class="form-control mb-3 js-select"id="section_id" name="section_id" onchange="loadGroup()" required>
                                                    <option selected>Select one</option>
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md" id="group-select">
                                                <label class="form-label">Group Name</label>
                                                <select class="form-control mb-3 js-select" id="group_id" name="group_id">
                                                    <option selected>Select one</option>
                                                </select>
                                                {{-- <select class="form-control mb-3 " name="group_id" required>
                                                    <option value="{{ old('Science') }}" >Science</option>
                                                    <option value="{{ old('Humanities') }}">Humanities</option>
                                                    <option value="{{ old('Business-studies') }}" >Business-studies</option>
                                                </select> --}}
                                            </div>
                                            <div class="col-md">
                                                <label>{{__('app.Image')}} </label>
                                                <input type="file" class="form-control" placeholder="{{__('app.Image')}}" accept="image/*" name="image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md">
                                                <label>{{__('app.Father Name')}} <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" placeholder="{{__('app.Fathers')}} {{__('app.Name')}}" name="father_name" value="{{ old('father_name') }}" required>
                                            </div>
                                            <div class="col-md">
                                                <label>{{__('app.Mother Name')}} <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" placeholder="{{__('app.Mothers')}} {{__('app.Name')}}" name="mother_name" value="{{ old('mother_name') }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label>{{__('app.Address')}}</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">{{__('app.Submit')}}</button>
                                        </div>
                                    </div>
                                </form>

                            @else

                                <form class="row g-3" method="post" action="{{route('student.update.post',$studentEdit->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{__('app.Student')}} {{__('app.Name')}} <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" placeholder="{{__('app.Student')}} {{__('app.Name')}}" name="name" value="{{$studentEdit->name}}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>{{__('app.RollNumber')}} <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" placeholder="{{__('app.RollNumber')}}" name="roll_number" value="{{$studentEdit->roll_number}}" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{__('app.Email')}} <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" placeholder="{{__('app.Email')}}" name="email" value="{{$studentEdit->email}}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>{{__('app.PhoneNumber')}} <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" placeholder="{{__('app.PhoneNumber')}}" name="phone" value="{{$studentEdit->phone}}" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{__('app.Gender')}} <span style="color:red;">*</span></label>


                                                    <input type="radio" id="Male" name="gender" value="Male"
                                                          {{($studentEdit->gender == 'Male') ? 'checked' : '' }} required>
                                                    <label for="huey">Male</label>

                                                    <input type="radio" id="Female" name="gender" value="Female" {{($studentEdit->gender == 'Female') ? 'checked' : '' }}>
                                                    <label for="dewey">Female</label>

                                            </div>
                                            <div class="col-md-6">
                                                <label>{{__('app.Birth')}} <span style="color:red;">*</span></label>
                                                <input type="date" id="datepicker" class="form-control" name="dob" value="{{$studentEdit->dob}}" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{__('app.Blood')}} {{__('app.Group')}}</label>
                                                <select name="blood_group" class="form-control mb-3 js-select" id="formSelect">
                                                    <option value="" selected>Select One</option>
                                                    <option value="A+" {{ ($studentEdit->blood_group == 'A+') ? 'selected' : '' }}>A+</option>
                                                    <option value="A-" {{ ($studentEdit->blood_group == 'A-') ? 'selected' : '' }}>A-</option>
                                                    <option value="B+" {{ ($studentEdit->blood_group == 'B+') ? 'selected' : '' }}>B+</option>
                                                    <option value="B-" {{ ($studentEdit->blood_group == 'B-') ? 'selected' : '' }}>B-</option>
                                                    <option value="O+" {{ ($studentEdit->blood_group == 'O+') ? 'selected' : '' }}>O+</option>
                                                    <option value="O-" {{ ($studentEdit->blood_group == 'O-') ? 'selected' : '' }}>O-</option>
                                                    <option value="AB+" {{ ($studentEdit->blood_group == 'AB+') ? 'selected' : '' }}>AB+</option>
                                                    <option value="AB-" {{ ($studentEdit->blood_group == 'AB-') ? 'selected' : '' }}>AB-</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label>{{__('app.Shift')}} <span style="color:red;">*</span></label>
                                                <select class="form-control mb-3 js-select" name="shift" required>
                                                    <option value="1" {{($studentEdit->shift == 1) ? 'selected' : ''}}>Morning</option>
                                                    <option value="2" {{($studentEdit->shift == 2) ? 'selected' : ''}}>Day</option>
                                                    <option value="3" {{($studentEdit->shift == 3) ? 'selected' : ''}}>Evening</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md">
                                                <label>{{__('app.Class')}} <span style="color:red;">*</span></label>
                                                <select class="form-control mb-3 js-select"aria-label="Default select example" name="class_id" id="class_id" onchange="loadSection()" required>
                                                    <option value="{{$studentEdit->class_id}}" selected>{{getClassName($studentEdit->class_id)->class_name}}</option>
                                                    @foreach($class as $data)
                                                        <option value="{{$data->id}}">{{$data->class_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md">
                                                <label>{{__('app.Section')}} {{__('app.Name')}} <span style="color:red;">*</span></label>
                                                <select class="form-control mb-3 js-select"id="section_id" name="section_id" required>
                                                <option value="{{$studentEdit->section_id}}" selected>{{getSectionName($studentEdit->section_id)->section_name}}</option>
                                                    {{-- @foreach($class as $data)
                                                        <option value="{{$data->id}}" >{{$data->section_name}}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>

                                            

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md" id="group-select">

                                                <label class="form-label">{{__('app.Group')}} {{__('app.Name')}}</label>
                                                <select class="form-control mb-3" name="group_id"  js-select>
                                                    <option value="" >Select One</option>
                                                    <option value="1" {{($studentEdit->group_id == 1) ? 'selected' : ''}}>Science</option>
                                                    <option value="2" {{($studentEdit->group_id == 2) ? 'selected' : ''}}>Commerce</option>
                                                    <option value="2" {{($studentEdit->group_id == 3) ? 'selected' : ''}}>Humanities</option>
                                                    

                                                </select>
                                                {{-- <select class="form-control mb-3 js-select" id="group_id" name="group_id">
                                                    <option selected>Select one</option> --}}
                                                    {{-- <option value="{{$studentEdit->group_id}}" selected>{{getGroupName($studentEdit->group_id)->group_name}}</option> --}}
                                                {{-- </select> --}}
                                            </div>
                                            <div class="col-md-6">
                                                <label>{{__('app.Image')}}</label>
                                                <input type="file" class="form-control mt-2" placeholder="" name="image" accept="image/*"><br>
                                                <img src="{{ asset($studentEdit->image ??'d/no-img.jpg') }}" alt="" width="50" class="rounded-circle"> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{__('app.Father Name')}} <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" placeholder="Father name" name="father_name" value="{{$studentEdit->father_name}}" required>

                                            </div>
                                            <div class="col-md-6">
                                                <label>{{__('app.Mother Name')}} <span style="color:red;">*</span></label>
                                                <input type="text" class="form-control" placeholder="Mother name" name="mother_name" value="{{$studentEdit->mother_name}}" required>

                                            </div>
                                           

                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label>{{__('app.Address')}}</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address" required>{{$studentEdit->address}}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">{{__('app.Submit')}}</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>




    <div class="modal fade" id="registerUser" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <table class="w-100 table">
                        <tbody>
                            <tr>
                                <td>
                                    <table class="w-100 table table-bordered">
                                        <tr>
                                            <td>Student Id</td>
                                            <td id="stid"></td>
                                        </tr>
                                        <tr>
                                            <td>Name</td>
                                            <td id="record_name"></td>
                                        </tr>
                                        <tr>
                                            <td>Roll Number</td>
                                            <td id="roll_number"></td>
                                        </tr>
                                        <tr>
                                            <td>Father Name</td>
                                            <td id="father_name"></td>
                                        </tr>
                                        <tr>
                                            <td>Mother Name</td>
                                            <td id="mother_name"></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td id="email"></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td id="phone"></td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <img id="record_img" alt="" width="200" class="img-fluid m-auto d-block">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="modalCloseBtn" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function(){
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
            });
        })
    </script>

    @if(session()->has('user'))
    <script>
        $(document).ready(function(){
            $("#registerUser").modal('show');
            $("#stid").text("{{session('user')->unique_id}}");
            $("#record_name").text("{{session('user')->name}}");
            $("#record_img").attr('src', '{{ asset(session("user")->image) }}');
            $("#father_name").text("{{session('user')->father_name}}");
            $("#mother_name").text("{{session('user')->mother_name}}");
            $("#roll_number").text("{{session('user')->roll_number}}");
            $("#phone").text("{{session('user')->phone}}");
            $("#email").text("{{session('user')->email}}");
        })
    </script>
    @endif

    <script>
        $(document).ready(function(){
            $("#modalCloseBtn").click(function(){
                {{ session()->forget('user') }}
            });
        })
    </script>

    <script>
        @if(old('class_id'))
            loadSection();
        @endif

        function loadSection() {
            let class_id = $("#class_id").val();
            let groupElement = `<label>Group Name</label>
                                <select class="form-control mb-3 js-select" id="group_id" name="group_id">
                                    <option value=" " selected>Select one</option>
                                    <option value="1" @if(isset($studentEdit))@if($studentEdit->group_id==1){{'selected'}}@endif @endif > Science </option>
                                    <option value="2" @if(isset($studentEdit))@if($studentEdit->group_id==2){{'selected'}}@endif @endif> Commerce </option>
                                    <option value="3" @if(isset($studentEdit))@if($studentEdit->group_id==3){{'selected'}}@endif @endif> Humanities </option>
                                </select>`;

            $.ajax({
                url:'{{route('admin.show.section')}}',
                method:'POST',
                data:{
                    '_token':'{{csrf_token()}}',
                    class_id:class_id
                },

                success: function (response) {

                    $('#section_id').html(response.html);

                    if(response.group == 1)
                    {
                        $("#group-select").html(groupElement);
                    }
                    else
                    {
                        $("#group-select").html('');
                    }
                }
            });

        }

        function loadGroup() {
            let class_id = $("#class_id").val();
            let section_id = $("#section_id").val();
            console.log(section_id,'sports-section');
            $.ajax({
                url:'{{route('admin.show.group')}}',
                method:'POST',
                data:{
                    '_token':'{{csrf_token()}}',
                    class_id:class_id,
                    section_id:section_id,
                },

                success: function (response) {
                    $('#group_id').html(response);
                }
            });

        }

    </script>
@endpush
