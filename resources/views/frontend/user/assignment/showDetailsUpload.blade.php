@extends('layouts.user.master')
@section('content')

    <main class="page-content">
        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">Show Assignment </h6>
            </div>
        </div>
        <div class="">
            <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <h4 class="mb-1">{{$assignment->title}}</h4>
                                        <p>{{$assignment->description}}</p>
                                        <a href="{{ asset($assignment->file)}}" target="_blank">Assignment File</a>
                                        {{-- <a href="{{ route('user.assignment.file', $assignment->id) }}">Assignment File</a> --}}
                                    </div>
                                    <div class="ms-auto fs-2 text-primary">
                                        <i class="bi bi-caret-up-fill"></i>
                                    </div>
                                </div>
                                <div class="border-top my-2"></div>
                                <small class="mb-0"><span class="text-success">Deadline <i class="bi bi-arrow-up"></i></span> {{date_format($assignment->updated_at,'M d Y')}}</small>
                            </div>
                        </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-none w-100">
                        <div class="card-body">
                            <form class="row g-3" method="post" action="{{route('user.teacher.assignment.upload')}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" placeholder="Assignment Title" name="title">
                                    <input type="hidden" class="form-control"  name="assignment_teachers_id" value="{{$assignment->id}}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="3" cols="3" placeholder="Product Description" name="description"></textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">File Upload</label>
                                    <input type="file" class="form-control" name="file_assignment">
                                </div>

                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary">Upload Your Text</button>
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
