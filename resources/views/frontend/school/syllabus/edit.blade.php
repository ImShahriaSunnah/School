@extends('layouts.school.master')

@section('content')
<!--start content-->
<main class="page-content">
    <div class="row">
        <div class="col-xl-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase"></h6>
                        <hr />
                        <h4>{{__('app.Change')}} {{__('app.Syllabus')}}</h4>
                        <form class="row g-3" method="post" action="{{route('syllabus.edit.post' ,$editSyllabus->id)}}">
                            @method('PUT')
                             @csrf
                            <div class="col-md-12">
                            </div>
                            <div class="col-12">

                                <select class="form-control mb-3 js-select"  aria-label="Default select example" name="common_class_id" id="common_class_id" onchange="loadSection()">
                                    <option selected>Class Name</option>

                                    @foreach($commonClass as $class)
                                    <option value="{{$class->id}}">{{$class->title}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-12">

                                <select class="form-control mb-3 js-select" value="$subject->id" aria-label="Default select example" name="common_subject_id" id="common_subject_id" onchange="loadSection()">
                                    <option selected>Subject</option>
                                    @foreach($commonSubject as $subject)
                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{__('app.Write')}} {{__('app.Syllabus')}}</label>
                                <textarea class="form-control" value="$editSyllabus->syllabus" id="syllabus" name="syllabus" rows="3"></textarea>
                                <option value="{{$editSyllabus->id}}">{{$editSyllabus->syllabus}}</option>

                            </div>
                            <br>
                            <div class="col-5">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">{{__('app.Save')}}</button>
                                </div>


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.16.1/ckeditor.min.js" integrity="sha512-rAcW+ICOLDCbt+nR7LGz6gsZ7vieGlsZmLyJ6W6xAzwiwwrD8kFhOZWc1+v59rto75ALFKRWk+DPeFQyAf9NHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    CKEDITOR.replace('syllabus');
</script>
@endpush