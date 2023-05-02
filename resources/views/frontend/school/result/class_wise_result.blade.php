@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <x-page-title title='See Result'/>
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <form class="row g-3" method="post" action="{{route('show.class.wise.result')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    @include('frontend.layouts.message')
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="">Select Result Type</label>
                                    <select class="form-control js-select" name="resultType" id="resultType" onchange="showResultForm()">
                                        <option value="" selected>Select Result Type</option>
                                        <option value="classWise">Class Wise Result</option>
                                        <option value="studentWise">Student Wise Result</option>
                                        <option value="yearlyFinalResult">Annual Result</option>
                                    </select>
                                </div>

                                <div class="d-none" id="showClassWiseForm">
                                    <div class="col-12 mb-3">
                                        <label for="">{{__('app.class')}}</label>
                                        <select class="form-control mb-3 js-select" name="class_wise_class_id" id="class_wise_class_id">
                                            <option value="" selected>Select Class</option>
                                            @foreach($class as $data)
                                                <option value="{{$data->id}}">{{$data->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label>Term Name</label>
                                        <select class="form-control mb-3 js-select" id="class_wise_term_id" name="class_wise_term_id">
                                            <option value="" selected>Select Term</option>
                                            @foreach($terms as $term)
                                                <option value="{{$term->id}}">{{$term->term_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="d-none" id="showstudentWiseForm">
                                    <div class="col-12 mb-3">
                                        <label>Term Name</label>
                                        <select class="form-control mb-3 js-select" id="student_wise_term_id" name="student_wise_term_id">
                                            <option value="" selected>Select Term</option>
                                            @foreach($terms as $term)
                                                <option value="{{$term->id}}">{{$term->term_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="">{{__('app.class')}}</label>
                                        <select class="form-control mb-3 js-select" name="student_wise_class_id" id="student_wise_class_id" onchange="classLoadSection()">
                                            <option value="" selected>Select Class</option>
                                            @foreach($class as $data)
                                                <option value="{{$data->id}}">{{$data->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- <div class="col-12 mb-3">
                                        <label>{{__('app.Section')}} {{__('app.Name')}} <span style="color:red;"></span></label>
                                        <select class="form-control mb-3 js-select"id="student_wise_section_id" name="section_id">
                                            <option selected>Select one</option>
                                         </select>
                                    </div> --}}

                                    <div class="col-12 mb-3">
                                        <label>Student Name</label>
                                        <select class="form-control js-select" id="student_wise_student_id" name="student_wise_student_id" >
                                            <option value="" selected>Select Student</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="d-none" id="showFinalResultForm">
                                    <div class="col-12 mb-3">
                                        <label for="">Class Name</label>
                                        <select class="form-control js-select" name="final_wise_class_id" id="final_wise_class_id" onchange="finalclassLoadSection()">
                                            <option value="" selected>Select Class</option>
                                            @foreach($class as $data)
                                                <option value="{{$data->id}}">{{$data->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label>Student Name</label>
                                        <select class="form-control js-select" id="final_student_wise_student_id" name="final_student_wise_student_id">
                                            <option value="" selected>Select Student</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Show Result</button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="lni lni-youtube"></i> Tutorial</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </main>
    <?php
    $tutorialShow = getTutorial('assign-teacher');
    ?>
    @include('frontend.partials.tutorial')

@endsection

@push('js')
     <script>
        function showResultForm()
        {
           var formType = $("#resultType").val();
           if (formType == "classWise") {
            $("#showClassWiseForm").removeClass('d-none');
            $("#showstudentWiseForm").addClass('d-none');
            $("#showFinalResultForm").addClass('d-none');
        } else if (formType == 'yearlyFinalResult') {
            $("#showClassWiseForm").addClass('d-none');
               $("#showFinalResultForm").removeClass('d-none');
                $("#showstudentWiseForm").addClass('d-none');
        }
        else {
               $("#showClassWiseForm").addClass('d-none');
               $("#showFinalResultForm").addClass('d-none');
                $("#showstudentWiseForm").removeClass('d-none');
           }
        }

        function classLoadSection()
        {
            var class_id = $("#student_wise_class_id").val();

            $.ajax({
                url:'{{route('class.wise.user')}}',
                method:'POST',
                data:{
                    '_token':'{{csrf_token()}}',
                    class_id:class_id
                },

                success: function (data) {
                    $("#student_wise_student_id").empty();
                    $.each(data, function (key, value) {
                         $("#student_wise_student_id").append(`
                        <option value="${value.id}">${value.name}</option>
                         `);
                    });
                }
            });

            $.ajax({
                url:'{{route('admin.show.section')}}',
                method:'POST',
                data:{
                    '_token':'{{csrf_token()}}',
                    class_id:class_id
                },

                success: function (response) {

                    $('#section_id').html(response.html);

                }
            });

        }
        function finalclassLoadSection()
        {
            var class_id = $("#final_wise_class_id").val();

            $.ajax({
                url:'{{route('class.wise.user')}}',
                method:'POST',
                data:{
                    '_token':'{{csrf_token()}}',
                    class_id:class_id
                },

                success: function (data) {
                    $("#final_student_wise_student_id").empty();
                    $.each(data, function (key, value) {
                         $("#final_student_wise_student_id").append(`
                        <option value="${value.id}">${value.name}</option>
                         `);
                    });
                }
            });
        }

        // function loadSection() {
        //     let class_id = $("#class_id").val();

        //     $.ajax({
        //         url:'{{route('admin.show.section')}}',
        //         method:'POST',
        //         data:{
        //             '_token':'{{csrf_token()}}',
        //             class_id:class_id
        //         },

        //         success: function (response) {

        //             $('#section_id').html(response.html);

        //         }
        //     });

        // }
    </script>
@endpush
