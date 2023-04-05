@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <form class="row g-3" method="post" action="{{route('finance.find.student')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    @include('frontend.layouts.message')
                                </div>

                                <div class="col-md-4">
                                    <label for="">{{__('app.class')}}</label>
                                    <select class="form-control mb-3 js-select" aria-label="Default select example" name="class_id" id="class_id" onchange="game_chf()" required>
                                        <option value="" selected>Select Class</option>
                                        @foreach($data['class'] as $class)
                                            <option value="{{$class->id}}">{{$class->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label>{{__('app.section')}}</label>
                                    <select class="form-control mb-3 js-select" id="section_id" name="section_id" onchange="group_chf()" required>
                                        <option value="" selected>Select Section</option>
                                    </select>
                                </div>

                                {{-- <div class="col-md-4" id="group-select">
                                    <label class="form-label">Group Name</label>
                                    <select class="form-control mb-3 js-select" id="group_id" name="group_id">
                                        <option selected>Select one</option>
                                    </select>
                                </div> --}}

                                <div class="col-12 m-0"></div>
                                <div class="col-md-4 m-0">
                                    <button type="submit" class="btn btn-outline-primary"> <i class="bi bi-search mr-3"></i> Find</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SID</th>
                                    <th>Roll Number</th>
                                    <th>Student Name</th>
                                    <th>{{__('app.class')}}</th>
                                    <th>{{__('app.section')}}</th>
                                    <th>Shift</th>
                                    <th>Group</th>
                                    <th>Student Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['students'] as $key => $row)
                                <tr>
                                    <td>{{$row->unique_id}}</td>
                                    <td>{{$row->roll_number}}</td>
                                    <td><div class="d-flex align-items-center gap-3 cursor-pointer">
                                            @if (File::exists($row->image))
                                            <img src="{{asset($row->image ?? 'd/no-img.jpg')}}" class="rounded-circle" width="44" height="44" alt="">
                                            @else
                                            <img src="{{asset('d/no-img.jpg')}}" class="rounded-circle" width="44" height="44" alt="">
                                            @endif
                                            
                                            <div class="">
                                                <p class="mb-0">{{$row->name}}</p>
                                            </div>
                                        </div></td>
                                    <td>{{isset(getClassName($row->class_id)->class_name) ? getClassName($row->class_id)->class_name : 'NO'}}</td>
                                    <td>{{isset(getSectionName($row->section_id)->section_name) ? getSectionName($row->section_id)->section_name : 'NO'}}</td>
                                    <td>@if ($row->shift == 1)Morning
                                        @elseif ($row->shift == 2) Day
                                        @else Evening
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->group_id == 1) Science
                                        @elseif ($row->group_id == 2) Commerce
                                        @else Humanities
                                        @endif
                                    </td>
                                    <td>{{$row->phone}}</td>
                                    <td></td>
                                    
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </main>

@endsection

@push('js')
    <script>


        // function game_chf() {
        //     let class_id = $("#class_id").val();
        //     //   console.log(class_id,'sports');
        //     $.ajax({
        //         url:'{{route('admin.show.section')}}',
        //         method:'POST',
        //         data:{
        //             '_token':'{{csrf_token()}}',
        //             class_id:class_id
        //         },

        //         success: function (response) {
        //             $('#section_id').html(response);
        //         }
        //     });

        // }

        function game_chf() {
            let class_id = $("#class_id").val();
            let groupElement = `<label class="form-label">Group Name</label>
                                <select class="form-control mb-3 js-select" id="group_id" name="group_id">
                                    <option selected>Select one</option>
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
                    
                    if(response.class > 8)
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

        function group_chf() {
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
