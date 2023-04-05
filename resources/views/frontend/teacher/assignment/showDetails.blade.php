@extends('layouts.teacher.master')

@section('content')
    <main class="page-content">
        <div class="card">
            <div class="card-header py-3">
                <h6 class="mb-0">Show Assignment </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card border shadow-none w-100">
                            <div class="card radius-10 mb-3">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">{{$data->title}}</p>
                                            <p class="mb-0 font-13 text-success"><i class="bi bi-caret-up-fill"></i><a href="{{asset($data->file)}}" target="_blank">Click Here</a> </p>
                                        </div>
                                        <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><i class="bx bxs-door-open"></i>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="card radius-10">
                                <div class="d-flex mt-3">
                                    <h5> <span style="color:blue;font-size: 14px;padding: 5px 5px;"> Assigned by : </span> {{Auth::user()->full_name}}</h5>
                                </div>
                                <div class="d-flex mt-3">
                                    <h5> <span style="color:blue;font-size: 14px;padding: 5px 5px;"> Deadline : </span> {{date_format($data->updated_at,'M d Y')}}</h5>
                                </div>
                                <div class="d-flex mt-3">
                                    <h5> <span style="color:blue;font-size: 14px;padding: 5px 5px;"> Status : </span></h5>
                                </div>
                                <div class="d-flex mb-2" style="padding: 5px 5px;">
                                    <form method="post" action="{{route('status.update.assignment',$data->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @if($data->status == 0)
                                        <input type="hidden" name="status" value="1">
                                        <button type="submit" class="btn btn-danger">Inactive</button>
                                    @else
                                        <input type="hidden" name="status" value="0">
                                        <button type="submit" class="btn btn-success">Active</button>
                                    @endif
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-lg-8 d-flex">
                        <div class="card border shadow-none w-100">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h5 class="mb-0">Submiting Student</h5>
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
                                                <th>Submit time</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($dataStudentUpload as $key => $upload)
                                                <tr>
                                                    <td>{{$key++ +1 }}</td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div><i class="bx bxs-file me-2 font-24 text-danger"></i>
                                                            </div>
                                                            <div class="font-weight-bold text-danger">{{$upload->title}}</div>
                                                        </div>
                                                    </td>
                                                    <td>{{$upload->created_at}}</td>
                                                    <td>
                                                        <div class="ms-auto">
                                                            <a href="{{asset($upload->file_assignment)}}" class="btn btn-sm btn-outline-secondary" target="_blank">View Details</a>
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
