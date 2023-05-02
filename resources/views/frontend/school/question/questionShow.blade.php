@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0"></h5>
                            <div class="col-md-2">
                                <label>{{ __('app.Class_Question') }}</label>
                                <select class="form-control mb-3 js-select"aria-label="Default select example" name="exam_term"
                                    id="examTerm" onchange="termWisequestion()">
                                    <option selected="" value="">{{ __('app.select') }}</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="ms-auto">
                                <button type="button" class="btn btn-secondary"
                                    onclick="history.back()">{{ __('app.back') }}</button>
                                <a href="{{ route('create.question.show') }}"
                                    class="btn btn-primary">{{ __('app.qstion_create') }}</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="lni lni-youtube"></i> Tutorial</button>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($questions) > 0)
                            
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{ __('app.no') }}</th>
                                            <th>{{ __('app.t') }}</th>
                                            <th>{{ __('app.type') }}</th>
                                            <th>{{ __('app.class') }}</th>
                                            <th>{{ __('app.subject') }}</th>
                                            <th>{{ __('app.active') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody id="show">
                                        @foreach ($questions as $key => $question)
                                            <tr class="hide">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $question->term?->term_name }}</td>
                                                <td>{{ $question->type }}</td>
                                                <td>{{ $question->class?->class_name }}</td>
                                                <td>{{ $question->subject?->subject_name }}</td>
                                                <td>
                                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                                        @if ($question->type == 'MCQ' || $question->type == 'Creative')
                                                            <a href="{{ route('view.mcq.creative.question', $question->id) }}"
                                                                class="btn btn-outline-info">View</a>
                                                        @else
                                                            <a href="{{ route('view.mcq.creative.question', $question->id) }}"
                                                                class="btn btn-outline-info">View</a>
                                                        @endif
                                                        <a href="{{ route('edit.question', $question->id) }}"
                                                            class="btn btn-outline-success"
                                                            style="margin-left: 5px; margin-right: 5px;">Edit</a>

                                                        <button type="button" class="btn btn-outline-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal{{ $key }}">Delete</button>
                                                    </div>
                                                </td>
                                                <div class="modal fade" id="deleteModal{{ $key }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true"
                                                    style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Question
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <form method="get"
                                                                action="{{ route('delete.question', $question->id) }}">
                                                                <div class="modal-body">
                                                                    Are you sure delete this question !?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">No</button>
                                                                    <button type="submit" class="btn btn-primary">Yes</button>
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
                        @else
                            <div>
                                <h3 class="text-danger text-center">Right Now Question Unavailable</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('frontend.partials.tutorial')
@endsection


@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <script>
        function showData(id) {
            $("#question").empty();
            $.ajax({
                type: "GET",
                url: "{{ url('school/student/view/single/question/') }}/" + id,
                data: "json",
                success: function(data) {
                    $.each(data, function(key, value) {
                        var i = 1;
                        if (value.class.class_name == "Play" || value.class.class_name == "Nursery" ||
                            value.class.class_name == "KG") {
                            $("#question").append(`

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h3>${value.school.school_name}</h3>
                                        <h3>${value.term.term_name}</h3>
                                        <h3>${value.class.class_name}</h3>
                                        <h3>${value.subject.subject_name}</h3>
                                    </div>
                                    <hr>
                                    <div class="col-md-9 mb-5">
                                        <h5>Name.................</h5>
                                        <h5>Roll.................</h5>
                                    </div>
                                    <div class="col-md-3 mb-5">
                                        <h5>${value.total_marks}</h5>
                                    </div> 
                                    
                                    <div class="row" id="after">
                                        
                                    </div>
                                    
                                </div>
                    
                        `);
                        } else {
                            $("#question").append(`

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h3>${value.school.school_name}</h3>
                                        <h3>${value.term.term_name}</h3>
                                        <h3>${value.class.class_name}</h3>
                                        <h3>${value.subject.subject_name}</h3>
                                    </div>
                                    <hr>
                                    
                                    <div class="col-md-3 offset-9 mb-5">
                                        <h5>${value.total_marks}</h5>
                                    </div> 
                                    
                                    <div class="row" id="after">
                                        
                                    </div>
                                    
                                </div>
                    
                        `);
                        }


                        $.each(value.question_title, function(key1, val) {

                            $("#after").append(`
                            <div class="col-md-9 ">
                                <h4>Q${i++}. ${val}</h4> <br>
                                <p>${value.question[key1]}</p>
                            </div>
                            
                            <div class="col-md-3 ">
                                <p>${value.question_mark[key1]}</p>
                            </div>
                         `);
                        });
                    });
                }
            });
        };

        showData();

        function termWisequestion() {
            var termId = $("#examTerm").val();
            $('.hide').fadeOut();
            $("#show").empty();
            $.ajax({
                type: "GET",
                url: "{{ url('/school/term/wiese/question/') }}/" + termId,
                dataType: "json",
                success: function(data) {
                    var i = 1;
                    $.each(data, function(key, value) {
                        $("#show").append(`
                        <tr>
                            <td>${i++}</td>
                            <td>${ value.term.term_name }</td>
                            <td>${ value.type }</td>
                            <td>${ value.class.class_name }</td>
                            <td>${value.subject.subject_name}</td>
                            <td>
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    {{--  <button onclick="showData(${value.id})" data-bs-toggle="modal" data-bs-target="#view_question" class="btn btn-outline-info">View</button> --}}
                                    <a href="{{ url('school/view/mcq/creative/question/') }}/${value.id}"  class="btn btn-outline-info">View</a>
                                    <a href="{{ url('/school/edit/question/') }}/ ${value.id}" class="btn btn-outline-success" style="margin-left: 5px; margin-right: 5px;">Edit</a>
                                    <button onclick="deleteQuestion(${value.id})" class="btn btn-outline-danger">Delete</button>
                                    {{-- <a href="{{ route('pdf.question', $question->id) }}" class="btn btn-outline-warning" style="margin-left: 5px; margin-right: 5px;">PdF</a> --}}
                                </div>
                            </td>    
                        </tr>
                    `);
                    });
                }
            });
        };

        function deleteQuestion(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('/school/ajax/delete/question/') }}/" + id,
                        dataType: "json",
                        success: function(data) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                        }
                    });

                }
            });
            termWisequestion();
        }
    </script>
@endpush
