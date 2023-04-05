@extends('layouts.teacher.master')

@section('content')
    <main class="page-content">
        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">Add Assignment </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-4 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card-body">
                                <form class="row g-3" method="post" action="{{route('post.teacher.assignment.upload')}}"  enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" placeholder="Assignment Title" name="title" required>
                                        <input type="hidden" class="form-control"  name="class_id" value="{{$class_id}}">
                                        <input type="hidden" class="form-control"  name="section_id" value="{{$section_id}}">
                                        <input type="hidden" class="form-control"  name="group_id" value="{{$group_id}}">
                                        <input type="hidden" class="form-control"  name="subject_id" value="{{$subject_id}}">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control" rows="3" cols="3" placeholder="Product Description" name="description" required></textarea>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">File Upload</label>
                                        <input type="file" class="form-control" name="file_assignment">
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Deadline</label>
                                        <input type="datetime-local" class="form-control" name="deadline" required>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary">Add Assignment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="mb-0">Assignment</h5>
                                        </div>
{{--                                        <div class="ms-auto"><a href="javascript:;" class="btn btn-sm btn-outline-secondary">View all</a>--}}
{{--                                        </div>--}}
                                    </div>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-hover mb-0">
                                            <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Assignment Title <i class="bx bx-up-arrow-alt ms-2"></i></th>
                                                <th>Submitted</th>
                                                <th>Last Modified</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($dataAss as $key => $assignment)
                                            <tr>
                                                <td>{{$key++ +1}}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div><i class="bx bxs-file me-2 font-24 text-danger"></i>
                                                        </div>
                                                        <div class="font-weight-bold text-danger">{{$assignment->title}}</div>
                                                    </div>
                                                </td>
                                                <td>{{getAssCountTeacher($assignment->id)}}</td>
                                                <td>{{date_format($assignment->updated_at,'M d Y')}}</td>
                                                <td>
                                                <div class="ms-auto">
                                                    <a href="{{route('details.teacher.assignment.show',$assignment->id)}}" class="btn btn-sm btn-outline-secondary">View Details</a>
                                                </div>
                                                </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->
                </div>
            </div>
        </main>

    @endsection
