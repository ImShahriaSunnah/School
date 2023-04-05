@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">Finance Form</h6>
                            <hr/>
                            <form class="row g-3" method="get" action="{{route('assign.teacher.create.show.post.new')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    @include('frontend.layouts.message')
                                </div>
                                <div class="col-12">
                                    <input type="hidden" name="url_data" value="{{ request()->segment(3)}}">
                                    <select class="form-control mb-3 js-select" aria-label="Default select example" name="class_id" id="class_id" onchange="game_chf()" required>
                                        <option value="" selected>Class Name</option>
                                        @foreach($class as $data)
                                            <option value="{{$data->id}}">{{$data->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Section Name</label>
                                    <select class="form-control mb-3 js-select" id="section_id" name="section_id" onchange="group_chf()" required>
                                        <option value="" selected>Select one</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Group Name</label>
                                    <select class="form-control mb-3 js-select" id="group_id" name="group_id">
                                        <option selected>Select one</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Month Name</label>
                                    <select class="form-control mb-3 js-select" id="group_id" name="month_name">
                                        <option value="January" {{('January' == date('F') ? 'selected' : '')}}>January</option>
                                        <option value="February" {{('February' == date('F') ? 'selected' : '')}}>February</option>
                                        <option value="March" {{('March' == date('F') ? 'selected' : '')}}>March</option>
                                        <option value="April" {{('April' == date('F') ? 'selected' : '')}}>April</option>
                                        <option value="May" {{('May' == date('F') ? 'selected' : '')}}>May</option>
                                        <option value="June" {{('June' == date('F') ? 'selected' : '')}}>June</option>
                                        <option value="July" {{('July' == date('F') ? 'selected' : '')}}>July</option>
                                        <option value="August" {{('August' == date('F') ? 'selected' : '')}}>August</option>
                                        <option value="September" {{('September' == date('F') ? 'selected' : '')}}>September</option>
                                        <option value="October" {{('October' == date('F') ? 'selected' : '')}}>October</option>
                                        <option value="November" {{('November' == date('F') ? 'selected' : '')}}>November</option>
                                        <option value="December" {{('December' == date('F') ? 'selected' : '')}}>December</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Shows Student Details</button>
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
            let groupElement = `<label class="form-label">Group Name</label>
                                <select class="form-select mb-3" id="group_id" name="group_id">
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
