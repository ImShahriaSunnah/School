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
                            <div class="d-none createForm">
                                <h6 class="mb-0 text-uppercase">Question Create Form</h6>
                                <hr/>
                            </div>
                            <div class="col-md-12" id="error">
                                @include('frontend.layouts.message')
                            </div>
                           
                            <form action="{{ route('question.store') }}" method="post" id="form_data" enctype="multipart/form-data">
                                @csrf
                                <!-- Modal -->
                                <div class="modal fade mymodal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            
                                            <div class="modal-body ">
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class=" btn btn-danger btn-sm"  data-bs-dismiss="modal">X</button>
                                                </div>
                                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                                    <div class="col">
                                                        <div class="btn card h-100 ">
                                                            <i class="fa fa-question-circle fa-xl mt-3 mb-1" aria-hidden="true"></i>
                                                            <input style="padding: 26px" class="btn btn-outline-success mt-3 question_type" type="button" name="question_type" value="MCQ">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="btn  card h-100 ">
                                                            <i class="fa fa-question-circle fa-xl mt-3 mb-1" aria-hidden="true"></i>
                                                            <input style="padding: 26px" class="btn btn-outline-info mt-3 question_type1"  type="button" name="question_type1" value="Written">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="btn card h-100">
                                                            <i class="fa fa-question-circle fa-xl mt-3 mb-1" aria-hidden="true"></i>
                                                            <input style="padding: 26px" class="btn  btn-outline-secondary mt-3 question_type2" type="button" name="question_type2" value="Creative">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 d-none" id="selectOption">
                                    <div class="row">
                                        <div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Exam Term</label>
                                                    <select class="form-control mb-3 js-select"aria-label="Default select example" name="exam_term" id="term_id" required>
                                                        <option selected="" value="">--Select Term--</option>
                                                        @foreach($terms as $term)
                                                            <option value="{{ $term->id }}" >{{ $term->term_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-2">
                                                    <label>{{__('app.class')}}</label>
                                                    <select class="form-control mb-3 js-select" aria-label="Default select example" name="class_name"  id="class_id"  required>
                                                        <option selected value="">--Select Class Name--</option>
                                                        @foreach($classes as $class)
                                                            <option value="{{ $class->id }}" >{{ $class->class_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Subject</label>
                                                    <select class="form-control mb-3 js-select" aria-label="Default select example" name="subject_name" id="subject_id" required>
                                                        <option selected value="">--Select Subject--</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="text-center">Hours/Min</label>
                                                    <div class="">
                                                        <div class="">
                                                            <input type="text" name="hours" value="{{ old('hours') }}" placeholder="Hours or Minutes" class="form-control" id="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="text-center">Total Marks</label>
                                                    <div class="">
                                                        <div class="">
                                                            <input type="text" name="total_mark" value="{{ old("total_mark") }}" placeholder="Total Mark" class="form-control" id="" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-none" id="written">
                                    <div class="col-12">
                                        {{-- written question --}}
                                        <div id="apeandField">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <label for="">Question Title</label>
                                                    <input name="question_title[1]" value="{{ old('question_title[1]') }}" class="form-control" type="text" >
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Mark</label>
                                                    <input name="question_mark[1]" value="{{ old('question_mark[1]') }}" class="form-control" type="text" >
                                                </div>

                                                <div class="col-md-1" >
                                                    <button type="button" class="btn btn-danger remove" style="margin-top: 22px; margin-left: 27px;">-</button>
                                                </div>

                                                <div class="col-md-12 mt-3">
                                                    <textarea name="questions[1]" class="editor" id="ckeditor" ></textarea>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-8">
                                                    <label for="">Question Title</label>
                                                    <input name="question_title[2]" value=" {{  old('question_title[1]')  }}" class="form-control" type="text">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Mark</label>
                                                    <input name="question_mark[2]" value=" {{ old('question_mark[1]') }}" class="form-control" type="text">
                                                </div>

                                                <div class="col-md-1" >
                                                    <button type="button" class="btn btn-danger remove" style="margin-top: 22px; margin-left: 27px;">-</button>
                                                </div>

                                                <div class="col-md-12 mt-3">
                                                    <textarea  name="questions[2]" class="editor" id="ckeditor1" ></textarea>
                                                </div>
                                            </div>

                                        </div>
                                        <div class=" d-flex justify-content-between mt-3">
                                            <button class="btn btn-success d-block " data-count="2" id="plusbtn">+</button>
                                            <button type="submit" class="btn btn-primary d-block">Save</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-none" id="mcq">
                                    <div class="col-12">
                                        {{-- MCQ Question --}}
                                        <div id="mcqapeandField">
                                            <div class="row">
                                                <div class="col-md-11 mt-3">
                                                    <textarea name="mcqQuestions[1]" id="ckeditor2" ></textarea>
                                                </div>
                                                <div class="col-md-1" >
                                                    <button type="button" class="btn btn-danger mcqRemove" style="margin-top: 16px; margin-left: 27px;">-</button>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label for="">A</label>
                                                    <input name="mcqQuestion_no[1][1]" class="form-control" type="text">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label for="">B</label>
                                                    <input name="mcqQuestion_no[1][2]" class="form-control" type="text">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label for="">C</label>
                                                    <input name="mcqQuestion_no[1][3]" class="form-control" type="text">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label for="">D</label>
                                                    <input name="mcqQuestion_no[1][4]" class="form-control" type="text">
                                                </div>
                                            </div>

                                            <div class="row">
                                                
                                                <div class="col-md-11 mt-3">
                                                    <textarea name="mcqQuestions[2]" id="ckeditor3" ></textarea>
                                                </div>
                                                <div class="col-md-1" >
                                                    <button type="button" class="btn btn-danger mcqRemove" style="margin-top: 16px; margin-left: 27px;">-</button>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <label for="">A</label>
                                                    <input name="mcqQuestion_no[2][1]" class="form-control" type="text">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label for="">B</label>
                                                    <input name="mcqQuestion_no[2][2]" class="form-control" type="text">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label for="">C</label>
                                                    <input name="mcqQuestion_no[2][3]" class="form-control" type="text">
                                                </div>

                                                <div class="col-md-6 mt-3">
                                                    <label for="">D</label>
                                                    <input name="mcqQuestion_no[2][4]" class="form-control" type="text">
                                                </div>
                                                
                                            </div>

                                        </div>

                                        <div class=" d-flex justify-content-between mt-3">
                                            <button class="btn btn-success d-block " mcq-ckeditor="3" data-count="2" id="mcqplusbtn">+</button>
                                            <button type="submit" class="btn btn-primary d-block">Save</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-none" id="creative">
                                    <div class="col-12">
                                        <div id="creativeapeandField">

                                            <div class="row">
                                                
                                                <div class="col-md-12 mt-3">
                                                    <textarea name="creQuestions[1]" id="ckeditor4" ></textarea>
                                                </div>

                                                <div class="col-md-8 mt-3">
                                                    <label for="">A</label>
                                                    <input name="creQuestion_no[1][1]" class="form-control" type="text">
                                                </div>

                                                <div class="col-md-3 mt-3">
                                                    <label for="">Mark</label>
                                                    <input name="creQuestion_mark[1][1]" class="form-control" type="text">
                                                </div>
                                                <div class="col-md-8 mt-3">
                                                    <label for="">B</label>
                                                    <input name="creQuestion_no[1][2]" class="form-control" type="text">
                                                </div>

                                                <div class="col-md-3 mt-3">
                                                    <label for="">Mark</label>
                                                    <input name="creQuestion_mark[1][2]" class="form-control" type="text">
                                                </div>
                                                <div class="col-md-8 mt-3">
                                                    <label for="">C</label>
                                                    <input name="creQuestion_no[1][3]" class="form-control" type="text">
                                                </div>

                                                <div class="col-md-3 mt-3">
                                                    <label for="">Mark</label>
                                                    <input name="creQuestion_mark[1][3]" class="form-control" type="text">
                                                </div>
                                                <div class="col-md-8 mt-3">
                                                    <label for="">D</label>
                                                    <input name="creQuestion_no[1][4]" class="form-control" type="text">
                                                </div>

                                                <div class="col-md-3 mt-3">
                                                    <label for="">Mark</label>
                                                    <input name="creQuestion_mark[1][4]" class="form-control" type="text">
                                                </div>

                                                <div class="col-md-1" >
                                                    <button type="button" class="btn btn-danger creRemove" style="margin-top: 40px; margin-left: 27px;">-</button>
                                                </div>
                                            </div>

                                        </div>

                                        <div class=" d-flex justify-content-between mt-3">
                                            <button class="btn btn-success d-block " cre-ckeditor="4" data-count="1" id="creplusbtn">+</button>
                                            <button type="submit" class="btn btn-primary d-block">Save</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection

@push('js')

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    
    <script>   
    </script>

    <script>
        $(document).ready(function () {
            $(".mymodal").modal('show');

            $(".question_type, .question_type1, .question_type2").on("click", function () {
                $(".mymodal").modal('hide');
                $(".createForm").removeClass("d-none");
                var type = $(this).val();
                $("#selectOption").prepend(`<input type="hidden" name="question_type" value="${type}" >`);
                // alert(type);
                if (type == "Written") {
                    $("#written").removeClass("d-none");
                    $("#creative").addClass("d-none");
                    $("#mcq").addClass("d-none");
                    $("#selectOption").removeClass("d-none");

                } else if (type == "MCQ") {
                    $("#written").addClass("d-none");
                    $("#creative").addClass("d-none");
                    $("#mcq").removeClass("d-none");
                    $("#selectOption").removeClass("d-none");
                } else {
                    $("#mcq").addClass("d-none");
                    $("#written").addClass("d-none");
                    $("#creative").removeClass("d-none");
                    $("#selectOption").removeClass("d-none");
                }

            });
        });
    </script>

    <script>
        CKEDITOR.replace('ckeditor', {
            filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('ckeditor1', {
            filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('ckeditor2', {
            filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('ckeditor3', {
            filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('ckeditor4', {
            filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#class_id").on('change', function () {
                var class_id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ url('/school/student/get/subjet/') }}/" + class_id,
                    datatype: "json",
                    success: function(data) {
                        $("#subject_id").empty();
                        $.each(data, function (key, value) { 
                             $("#subject_id").append('<option value="'+value.id+'"> '+value.subject_name+' </option>');                  
                        });
                    }
                });
            });

            $("#plusbtn").on('click', function (e) {
                e.preventDefault();
                var val = +$(this).attr('data-count') + 1;
                
                console.log(val);
                $("#apeandField").append(`
                    <div class="row mt-3">
                        <div class="col-md-8 mt-3">
                            <label for="">Question Name</label>
                            <input name="question_title[${val}]"  class="form-control" type="text">
                        </div>

                        <div class="col-md-3 mt-3">
                            <label for="">Mark</label>
                            <input name="question_mark[${val}]" class="form-control" type="text">
                        </div>

                        <div class="col-md-1" >
                            <button type="button" class="btn btn-danger remove" style="margin-top: 37px; margin-left: 27px;">-</button>
                        </div>

                        <div class="col-md-12 mt-3">
                            <textarea name="questions[${val}]" id="ckeditor${val}"></textarea>
                        </div>
                    </div>
                `);
                
                CKEDITOR.replace('ckeditor' + val, {
                    filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
                    filebrowserUploadMethod: 'form'
                });
                // $(this).attr('data-count') = val + 1;
                $(this).attr('data-count', val);
            });

            $("#mcqplusbtn").on("click", function (e) {
                e.preventDefault();
                var val = +$(this).attr('data-count') + 1;
                var mcqVal = + $(this).attr('mcq-ckeditor') + 1;
                console.log(val);
                $("#mcqapeandField").append(`
                   
                <div class="row">
                                                
                    <div class="col-md-11 mt-3">
                        <textarea name="mcqQuestions[${val}]" id="ckeditor${mcqVal}" ></textarea>
                    </div>
                    <div class="col-md-1" >
                        <button type="button" class="btn btn-danger mcqRemove" style="margin-top: 16px; margin-left: 27px;">-</button>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="">A</label>
                        <input name="mcqQuestion_no[${val}][1]" class="form-control" type="text">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="">B</label>
                        <input name="mcqQuestion_no[${val}][2]" class="form-control" type="text">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="">C</label>
                        <input name="mcqQuestion_no[${val}][3]" class="form-control" type="text">
                    </div>

                    <div class="col-md-6 mt-3">
                        <label for="">D</label>
                        <input name="mcqQuestion_no[${val}][4]" class="form-control" type="text">
                    </div>
                    
                </div>
                `);

                CKEDITOR.replace('ckeditor' + mcqVal, {
                    filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
                    filebrowserUploadMethod: 'form'
                });

                $(this).attr('mcq-ckeditor', mcqVal);

                $(this).attr('data-count', val);

            });

            $("#creplusbtn").on('click', function (e) {
                e.preventDefault();
                var creVal = + $(this).attr('data-count') + 1;
                var creEdit = + $(this).attr('cre-ckeditor') + 1;
                $("#creativeapeandField").append(`

                        <div class="row">
                                                        
                            <div class="col-md-12 mt-3">
                                <textarea name="creQuestions[${creVal}]" id="ckeditor${creEdit}" ></textarea>
                            </div>

                            <div class="col-md-8 mt-3">
                                <label for="">A</label>
                                <input name="creQuestion_no[${creVal}][1]" class="form-control" type="text">
                            </div>

                            <div class="col-md-3 mt-3">
                                <label for="">Mark</label>
                                <input name="creQuestion_mark[${creVal}][1]" class="form-control" type="text">
                            </div>
                            <div class="col-md-8 mt-3">
                                <label for="">B</label>
                                <input name="creQuestion_no[${creVal}][2]" class="form-control" type="text">
                            </div>

                            <div class="col-md-3 mt-3">
                                <label for="">Mark</label>
                                <input name="creQuestion_mark[${creVal}][2]" class="form-control" type="text">
                            </div>
                            <div class="col-md-8 mt-3">
                                <label for="">C</label>
                                <input name="creQuestion_no[${creVal}][3]" class="form-control" type="text">
                            </div>

                            <div class="col-md-3 mt-3">
                                <label for="">Mark</label>
                                <input name="creQuestion_mark[${creVal}][3]" class="form-control" type="text">
                            </div>
                            <div class="col-md-8 mt-3">
                                <label for="">D</label>
                                <input name="creQuestion_no[${creVal}][4]" class="form-control" type="text">
                            </div>

                            <div class="col-md-3 mt-3">
                                <label for="">Mark</label>
                                <input name="creQuestion_mark[${creVal}][4]" class="form-control" type="text">
                            </div>

                            <div class="col-md-1" >
                                <button type="button" class="btn btn-danger creRemove" style="margin-top: 40px; margin-left: 27px;">-</button>
                            </div>
                        </div>

                `);

                CKEDITOR.replace('ckeditor' + creEdit, {
                    filebrowserUploadUrl: "{{ route('ckeditor.image.upload', ['_token' => csrf_token()]) }}",
                    filebrowserUploadMethod: 'form'
                });

                $(this).attr('data-count', creVal);
                $(this).attr('cre-ckeditor', creEdit);
            });

        });
        $(document).on('click', '.remove', function(e) {
            e.preventDefault();
                $(this).closest('.row').remove();
            });
        
        $(document).on('click', '.mcqRemove', function (e) {
            e.preventDefault();
            $(this).closest('.row').remove();
        }); 
        
        $(document).on('click', '.creRemove', function (e) {
            e.preventDefault();
            $(this).closest('.row').remove();
        }); 
    </script>

    <script>
        function store() {
            var form_data = $("#form_data").serialize();
           var edit = CKEDITOR.instances.ckeditor.getData();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "{{ url('school/ajax/question/store') }}",
                data: form_data,
                dataType: "json",
                beforeSend: function () {
                    $("#error").empty();
                },
                success: function (data) {
                    if (data.status == "fail"){
                        $("#error").append(` <ul> <li class="text-danger">${data.error}</li></ul> `);
                        Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: data.error,
                        showConfirmButton: false,
                        timer: 5000
                        });
                    }
                }
            });
        }
        setInterval(store, 60000);
    </script>
@endpush
