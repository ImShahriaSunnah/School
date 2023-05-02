@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <center><h3>{{__('app.student')}}</h3></center>

        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md mb-3">
                                    <select class="form-control mb-3 js-select" name="class" id="" class="form-select" required onchange="loadSection(this.value)">
                                        <option value="" selected disabled>{{__('app.class')}} {{__('app.select')}}</option>
                                        @foreach ($data['classes'] as $class)
                                            <option value="{{$class->id}}" @isset(request()->class) {{(request()->class == $class->id) ? 'selected' : ''}}  @endisset>{{$class->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md mb-3">
                                    <select class="form-control mb-3 js-select"  name="section" class="form-select" id="section">
                                        <option value="" selected> {{__('app.Section')}} {{__('app.select')}}</option>
                                    </select>
                                </div>

                                <div class="col-md mb-3">
                                    <select class="form-control mb-3 js-select" name="month" class="form-select" id="section">
                                        <option value="" selected disabled> {{__('app.Month')}} {{__('app.select')}}</option>
                                        @foreach ($data['months'] as $key => $month)
                                            <option value="{{$key}}" @isset(request()->month) {{(request()->month == $key) ? 'selected' : ''}}  @endisset>{{$month}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md mb-3">
                                    <button class="btn btn-outline-primary"> <i class="bi bi-search"></i> {{__('app.search')}} </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>{{__('app.image')}}</th>
                                    <th>{{__('app.student')}}</th>
                                    <th>{{__('app.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['students'] as $student)
                                    <tr>
                                        <td>
                                            @if(File::exists(public_path($student->image)))
                                            <img src="{{asset($student->image)}}" alt="{{$student->unique_id}}" style="height: 65px; width: 65px">    
                                            @else
                                            <img src="{{asset('d/no-img.jpg')}}" alt="{{$student->unique_id}}" style="height: 65px; width: 65px">
                                            @endif
                                            <br>
                                            SID: {{$student->unique_id}}
                                        </td>
                                        <td>
                                            Name: {{$student->name}} <br>
                                            Class: {{getClassName($student->class_id)->class_name}} <br>
                                            Roll: {{$student->roll_number}} <br>
                                            Phone: {{$student->phone}} <br>
                                        </td>
                                        <td>
                                            <a 
                                                type="button"
                                                href="{{route('school.finance.find.student.fee', [$student->id, request()->month ?? 'n'])}}"
                                                class="btn btn-outline-primary"
                                            >
                                                <i class="mx-auto bi bi-eye"></i> 
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end">
                            {!! $data['students']->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@push('js')

<script>
    function loadSection(classId) {
            $.ajax({
                url:'{{route('admin.show.section')}}',
                method:'POST',
                data:{
                    '_token':'{{csrf_token()}}',
                    "class_id": classId
                },
                success: function (response) {
                    $('#section').html(response.html);
                }
            });

        }
</script>
@endpush