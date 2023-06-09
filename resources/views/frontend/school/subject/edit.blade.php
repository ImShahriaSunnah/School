@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">{{$subjectText}} Form</h6>
                            <hr/>
                            <form class="row g-3" method="post" action="{{route('subject.create.update',$subject->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    @include('frontend.layouts.message')
                                </div>
                                <input type="hidden" name="active" value="1">
                                <div class="col-12">
                                    <label class="form-label">Subject Name</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Subject Name" name="subject_name" value="{{$subject->subject_name}}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <select class="form-select mb-3 js-select" aria-label="Default select example" name="class_id" id="class_id" onchange="game_chf()">
                                        <option value="">Class Name</option>
                                        <option value="{{$subject->class_id}}" selected>{{getClassName($subject->class_id)->class_name}}</option>
                                        @foreach($class as $data)
                                            <option value="{{$data->id}}">{{$data->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                {{-- <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="active" value="1" {{($subject->active == 1) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="gridCheck1" >
                                            Check me out
                                        </label>
                                    </div>
                                </div> --}}
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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

@endsection

@push('js')
    <script>
        function game_chf() {
            let class_id = $("#class_id").val();
            //   console.log(class_id,'sports');
            $.ajax({
                url:'{{route('admin.show.section')}}',
                method:'POST',
                data:{
                    '_token':'{{csrf_token()}}',
                    class_id:class_id
                },

                success: function (response) {
                    $('#section_id').html(response);
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