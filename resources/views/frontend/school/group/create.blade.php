@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            @if (!isset($sectionEdit))                                
                                <h6 class="mb-0 text-uppercase">{{__('app.Group')}} {{__('app.Create')}}</h6>
                            @else
                            <h6 class="mb-0 text-uppercase">{{__('app.Group')}} {{__('app.Update')}}</h6>
                            @endif
                            <hr/>
                            @if(!isset($sectionEdit))
                                <form class="row g-3" method="post" action="{{route('group.create.post')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">{{__('app.Class')}} {{__('app.Name')}} <span style="color: red;">*</span></label>
                                        <div class="input-group mb-3">
                                            <select class="form-control mb-3 js-select" aria-label="Default select example" name="class_id" id="class_id" onchange="game_chf()" required>
                                                <option value="" required selected>Select One</option>
                                                @forelse($class as $key => $data)
                                                    @if($data->class_name == 'Class Nine' || $data->class_name == 'Class Ten' || $data->class_name == 'Class Eleven' || $data->class_name == 'Class Twelve')
                                                        <option value="{{$data->id}}">{{$data->class_name}} </option>
                                                    @endif
                                                @empty
                                                <option value="">No Class Found</option>
                                                @endforelse
                                            </select>
                                            @if(count($class) > 0)
                                            @else
                                                <label class="input-group-text" for="inputGroupSelect02" style="margin-left: 5px;background-color: transparent;border-color: transparent;text-decoration: underline;">
                                                    <span class="badge bg-primary">
                                                        <input type="hidden" name="url_check" value="{{Request::segment(2).'/'.Request::segment(3)}}/class ">
                                                        <button type="submit" style="background-color: transparent;color: #f1f1f1;border-color: transparent;">click here</button>
                                                    </span>
                                                </label>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="col-12">

                                        @if(getSectionCount() > 0)
                                        <label class="form-label">Section Name <span style="color: red;"> *</span></label> <br>
                                        @else
                                        <div class="input-group mb-3">
                                        @endif
                                        <select class="form-control mb-3 js-select" id="section_id" name="section_id" required>
                                                <option selected disabled>{{(getSectionCount() == 0) ? 'No section' : 'Select one'}}</option>

                                        </select>
                                        @if(getSectionCount() > 0)
                                        @else
                                            <label class="input-group-text" for="inputGroupSelect02" style="margin-left: 5px;background-color: transparent;border-color: transparent;text-decoration: underline;">
                                                        <span class="badge bg-primary">
                                                            <input type="hidden" name="url_check2" value="{{Request::segment(2).'/'.Request::segment(3)}}/section">
                                                            <button type="submit" style="background-color: transparent;color: #f1f1f1;border-color: transparent;">click here</button>
                                                        </span>
                                            </label>
                                        </div>
                                        @endif

                                    </div> --}}
                                    <div class="col-12">
                                        <label class="form-label">{{__('app.Group')}} {{__('app.Name')}} <span style="color: red;"> *</span></label>
    {{--                                        <input type="text" class="form-control" placeholder="Group name" name="group_name">--}}
                                        <select class="form-control mb-3 js-select" name="group_name" required>
                                            <option value="" selected>Select One</option>
                                            <option value="Science">Science</option>
                                            <option value="Humanities">Humanities</option>
                                            <option value="Business-studies">Business Studies</option>
                                        </select>

                                    </div>
                                    {{-- <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="active" value="1">
                                            <label class="form-check-label" for="gridCheck1">
                                                Active
                                            </label>
                                        </div>
                                    </div> --}}
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">{{__('app.Submit')}}</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form class="row g-3" method="post" action="{{route('group.update.post',$sectionEdit->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">{{__('app.Class')}} {{__('app.Name')}} <span style="color: red;">*</span></label>
                                        <select class="form-control mb-3 js-select" aria-label="Default select example" name="class_id" id="class_id" onchange="game_chf()">
                                            <option value="" required selected>Select One</option>
                                            @forelse($class as $key => $data)
                                                @if($data->class_name == 'Class Nine' || $data->class_name == 'Class Ten' || $data->class_name == 'Class Eleven' || $data->class_name == 'Class Twelve')
                                                <option value="{{$data->id}}" required {{($data->id == $sectionEdit->class_id) ? 'Selected' : ''}}>{{$data->class_name}}</option>
                                                @endif
                                            @empty
                                            <option value="">No Class Found</option>
                                            @endforelse
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">{{__('app.Select')}} {{__('app.Group')}} <span style="color: red;"> *</span></label> 
                                        <select class="form-control mb-3 js-select" required name="group_name">
                                            <option value="Science" {{($sectionEdit->group_name == 'Science') ? 'selected' : ''}}>Science</option>
                                            <option value="Humanities" {{($sectionEdit->group_name == 'Humanities') ? 'selected' : ''}}>Humanities</option>
                                            <option value="Business-studies" {{($sectionEdit->group_name == 'Business-studies') ? 'selected' : ''}}>Business-studies</option>
                                        </select>

                                    </div>
                                    {{-- <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="active" value="1"  {{($sectionEdit->active == 1) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="gridCheck1">
                                                Active
                                            </label>
                                        </div>
                                    </div> --}}
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
        <!--end row-->
    </main>

@endsection

@push('js')
    <script>
        function game_chf() {
            let class_id = $("#class_id").val();
            console.log(class_id,'sports');
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

    </script>
@endpush
