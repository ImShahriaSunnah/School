@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">{{__('app.Student')}} {{__('app.List')}}</h6>
                            <hr/>
                            <form class="row g-3" method="get" action="{{route('student.find')}}">
                                {{-- @csrf --}}
                                <div class="col-md-12">
                                    @include('frontend.layouts.message')
                                </div>
                                <div class="col-2">
                                    <input type="hidden" name="url_data" value="{{ request()->segment(2)}}">
                                    <label class="form-label">{{__('app.Class')}}</label>
                                    <select class="form-control mb-3 js-select" name="class_id" id="class_id" onchange="loadSection()">
                                        <option value="" selected>Select One</option>
                                        @foreach($class as $data)
                                            <option value="{{$data->id}}">{{$data->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label class="form-label">{{__('app.Section')}}</label>
                                    <select class="form-control js-select mb-3" id="section_id" name="section_id" onchange="loadClass()">
                                        <option value="" selected>Select Class First</option>
                                    </select>
                                </div>

                                <div class="col-2">
                                    <label class="form-label">{{__('app.Shift')}}</label>
                                    <select class="form-control js-select mb-3" id="shift_id" name="shift_id">
                                        <option value="" selected>Select one</option>
                                        <option value="1">Morning</option>
                                        <option value="2">Day</option>
                                        <option value="3">Evening</option>
                                    </select>
                                </div>

                                <div class="col-2" id="group-select">
                                    {{-- <label class="form-label">Group Name</label>
                                    <select class="form-control mb-3 js-select" id="group_id" name="group_id">
                                        <option selected>Select one</option>
                                    </select> --}}
                                </div> 
                                <div class="col-2">
                                    <label class="form-label"> </label>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">{{__('app.Search')}}</button>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <label class="form-label"> </label>
                                    <div class="d-grid">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="lni lni-youtube"></i> {{__('app.Tutorial')}}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end row-->

        <div class="row">
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>{{__('app.nong')}}</th>
                                    <th>{{__('app.RollNumber')}}</th>
                                    <th>{{__('app.Student')}} {{__('app.Name')}}</th>
                                    <th>{{__('app.Class')}}</th>
                                    <th>{{__('app.Section')}}</th>
                                    <th>{{__('app.Shift')}}</th>
                                    <th>{{__('app.Group')}}</th>
                                    <th>{{__('app.PhoneNumber')}}</th>
                                    <th>{{__('app.Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataShow as $key => $data)
                                    <tr>
                                        <td>{{$key++ +1}}</td>
                                        <td>{{$data->roll_number}}</td>
                                        <td><div class="d-flex align-items-center gap-3 cursor-pointer">
                                                @if(File::exists($data->image))
                                                <img src="{{asset($data->image)}}" class="rounded-circle" width="44" height="44" alt="">
                                                @else
                                                <img src="{{asset('d/no-img.jpg')}}" class="rounded-circle" width="44" height="44" alt="">
                                                @endif
                                                {{-- <img src="{{asset($data->image)}}" class="rounded-circle" width="44" height="44" alt=""> --}}
                                                <a class="text-decoration-none" href="{{route('student.singleShow',$data->id)}}">
                                                    <p class="mb-0">{{ strtoupper($data->name)}}</p>
                                                </a>
                                            </div></td>
                                        <td>{{isset(getClassName($data->class_id)->class_name) ? getClassName($data->class_id)->class_name : 'NO'}}</td>
                                        <td>{{isset(getSectionName($data->section_id)->section_name) ? getSectionName($data->section_id)->section_name : 'NO'}}</td>
                                        <td>@if ($data->shift == 1)Morning
                                            @elseif ($data->shift == 2) Day
                                            @else Evening
                                            @endif
                                        </td>
                                        <td>
                                            @if($data->group_id == 1) Science
                                            @elseif ($data->group_id == 2) Commerce
                                            @elseif ($data->group_id == 3) Humanities
                                            @else 
                                            --
                                            @endif
                                        </td>
                                        <td>{{$data->phone}}</td>
                                        
                                        <td>
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a  href="{{route('student.singleShow',$data->id)}}" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                                <a  href="{{route('student.edit',$data->id)}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                               {{-- <a href="{{route('student.delete',['id'=>$data->id])}}" class="btn btn-danger"><i class="bi bi-trash-fill" ></i></a> --}}
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$data->id}}"><i class="bi bi-trash-fill" ></i></button>
                                            </div>
                                        </td>
                                        <div class="modal fade" id="deleteModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{__('app.Delete')}} {{__('app.Student')}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="get" action="{{route('student.delete',['id'=>$data->id])}}">
                                                        <div class="modal-body">
                                                            {{__('app.surecall')}}  ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{__('app.no')}}</button>
                                                            <button type="submit" class="btn btn-primary">{{__('app.yes')}}</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    $tutorialShow = getTutorial('student-show');
    ?>
    @include('frontend.partials.tutorial')

@endsection

@push('js')
    <script>
        function loadSection() {
            let class_id = $("#class_id").val();            
             let groupElement = `<label class="form-label">Group</label>
             <select class="form-control mb-3 js-select" id="group_id" name="group_id">
                                    <option value=" " selected>Select one</option>
                                    <option value="1" > Science </option>
                                    <option value="2" > commerce </option>
                                    <option value="3" > Humanities </option>
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

        // function loadClass() {
        //     let class_id = $("#class_id").val();
        //     let section_id = $("#section_id").val();
        //     console.log(section_id,'sports-section');
        //     $.ajax({
        //         url:'{{route('admin.show.group')}}',
        //         method:'POST',
        //         data:{
        //             '_token':'{{csrf_token()}}',
        //             class_id:class_id,
        //             section_id:section_id,
        //         },

        //         success: function (response) {
        //             $('#group_id').html(response);
        //         }
        //     });

        // }

    </script>
@endpush
