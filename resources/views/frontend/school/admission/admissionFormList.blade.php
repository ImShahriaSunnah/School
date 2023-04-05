@extends('layouts.school.master')

@section('content')
<main class="page-content">
    <div class="row">
        <div class="col-xl-12 mx-auto">
            <div class="card">
                <h2 style="margin:10px; text-align:center; ">{{__('app.request Stduent')}}</h2>
                <div class="row">
                    <div class="col-lg-5">
                    </div>
                    <div class="col-lg-5"></div>
                </div>


                <div class="card-body">

                    <div class="card-body table-responsive">

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('app.name')}}</th>
                                    <th>{{__('app.old school')}}</th>
                                    <th>{{__('app.class')}}</th>
                                    <th>{{__('app.image')}}</th>
                                    <th>{{__('app.active')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $key => $id)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{ $id->name}}</td>
                                    <td>{{ $id->old_school}}</td>
                                    <td>{{ $id->In_class}}</td>
                                   <td><img width="100px" src="{{url('/up/'.$id->image)}}" alt=""></td> 

                                    <td>


                                        <a href="{{route('online.Admission.Delete',['id'=>$id->id])}}" class="btn btn-danger"><i class="bi bi-trash2-fill"></i></a>

                                        {{-- <a href="{{route('online.Admission.Edit',['id'=>$id->id])}}" class="btn btn-success"><i class="bi bi-pencil-fill"></i></a> --}}

                                        <a href="{{route('online.Admission.Single.Show',['id'=>$id->id])}}" class="btn btn-primary"><i class="bi bi-bullseye"></i></a>

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


</main>

@endsection