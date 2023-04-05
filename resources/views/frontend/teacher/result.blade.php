@extends('layouts.teacher.master')

@section('content')

    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">

                <div class="card">
                    <form method="post" action="{{route('teacher.result.create.post')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Student Name</th>
                                        <th>Student Roll Number</th>
                                        <th style="text-align: center;">{{$dataSubject->subject_name}}</th>
                                        {{--                                    <th>Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($dataStudent as $key => $data)
                                        <tr>
                                            <td>{{$key++ +1}}</td>
                                            <td>
                                                <div class="d-flex align-items-center gap-3 cursor-pointer">
                                                    <img src="{{asset('profile/img/'.$data->image)}}" class="rounded-circle" width="44" height="44" alt="">
                                                    <div class="">
                                                        <p class="mb-0">{{$data->name}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$data->roll_number}}</td>
                                            <?php
                                            $resultHaveorNot =  getResultHaveorNotUser($data->id,$dataSubject->id,$dataTerm->id);
                                            $resultHaveorNotById =  getResultHaveorNotByIdUser($data->id,$dataSubject->id,$dataTerm->id);

                                            ?>
                                            {{--                                        @if($resultHaveorNotById != 0)--}}
                                            {{--                                        <form method="post" action="{{route('result.update.post',$resultHaveorNotById)}}" enctype="multipart/form-data">--}}
                                            {{--                                        @else--}}
                                            {{--                                        @endif--}}
                                            {{--                                            @csrf--}}
                                            <td>
                                                <input type="hidden" class="form-control" name="student_id[]" value="{{$data->id}}">
                                                <input type="hidden" class="form-control" name="student_roll_number[]" value="{{$data->roll_number}}">
                                                <input type="hidden" class="form-control" name="subject_id" value="{{$dataSubject->id}}">
                                                <input type="hidden" class="form-control" name="term_id" value="{{$dataTerm->id}}">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Written</label>
                                                        <input type="text" class="form-control" name="written[]" value="{{  (!isset($resultHaveorNot->written)) ? '' : $resultHaveorNot->written }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Mcq</label>
                                                        <input type="text" class="form-control" name="mcq[]" value="{{  (!isset($resultHaveorNot->mcq)) ? '' : $resultHaveorNot->mcq }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Practical</label>
                                                        <input type="text" class="form-control" name="practical[]" value="{{  (!isset($resultHaveorNot->practical)) ? '' : $resultHaveorNot->practical }}">
                                                    </div>
                                                </div>
                                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete Class</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="get" action="{{route('student.delete',['id'=>$data->id])}}">
                                                            <div class="modal-body">
                                                                Are you Sure To Delete ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
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
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                            <button  type="submit" class="btn btn-success">update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>

@endsection
