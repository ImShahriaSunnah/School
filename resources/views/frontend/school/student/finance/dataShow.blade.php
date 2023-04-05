@extends('layouts.school.master')

@section('content')
    <!--start content-->
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Class Name</th>
                                    <th>Section Name</th>
                                    <th>Group Name</th>
                                    <th>Student Name</th>
                                    <th>Student Phone</th>
                                    <th>Student Roll Number</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataShow as $key => $data)
                                    <tr>
                                        <td>{{$key++ +1}}</td>
                                        <td>{{isset(getClassName($data->class_id)->class_name) ? getClassName($data->class_id)->class_name : 'NO'}}</td>
                                        <td>{{isset(getSectionName($data->section_id)->section_name) ? getSectionName($data->section_id)->section_name : 'NO'}}</td>
                                        <td>{{isset(getGroupname($data->group_id)->group_name) ? getGroupname($data->group_id)->group_name : 'NO'}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->phone}}</td>
                                        <td>{{$data->roll_number}}</td>
                                        <td>
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a  href="{{route('add.fees.show',['id'=>$data->id,'class_id'=>$data->class_id,'section_id'=>$data->section_id,'group_id'=>is_null($data->group_id) ? 0 : $data->group_id])}}" class="btn btn-success">Add Fees</a>
                                                <a href="{{route('subject.delete',['id'=>$data->id,'class_id'=>$data->class_id,'section_id'=>$data->section_id,'group_id'=>is_null($data->group_id) ? 0 : $data->group_id])}}" class="btn btn-danger"></a>
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
        <!--end row-->
    </main>

@endsection
