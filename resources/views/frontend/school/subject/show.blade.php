@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">{{__('app.add')}} {{__('app.Subject')}}</h6>
                            <hr/>
                                <form class="row g-3" method="post" action="{{route('subject.create.post')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        @include('frontend.layouts.message')
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">{{__('app.Subject')}} {{__('app.Name')}}</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="{{__('app.Subject')}} {{__('app.Name')}}" name="subject_name" required>
                                            <input type="hidden" class="form-control"   name="class_id" value="{{$class_id}}">

                                        </div>
                                    </div>
                                    {{-- <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1" name="active" value="1">
                                            <label class="form-check-label" for="gridCheck1">
                                                Check me out
                                            </label>
                                        </div>
                                    </div> --}}
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">{{__('app.Submit')}}</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>{{__('app.nong')}}</th>
                                    <th>{{__('app.Subject')}} {{__('app.Name')}}</th>
                                    <th>{{__('app.Class')}} {{__('app.Name')}}</th>
                                    
                                    <th>{{__('app.Action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dataShow as $key => $data)
                                    <tr>
                                        <td>{{$key++ +1}}</td>
                                        <td>{{$data->subject_name}}</td>
                                        <td>{{isset(getClassName($data->class_id)->class_name) ? getClassName($data->class_id)->class_name : 'NO'}}</td>
                                        
                                        <td>
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a  href="{{route('subject.edit',$data->id)}}" class="btn btn-success">{{__('app.Edit')}}</a>
                                               
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$data->id}}">{{__('app.Delete')}}</button>
                                            </div>
                                        </td>
                                        <div class="modal fade" id="deleteModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{__('app.Delete')}} {{__('app.Subject')}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="get" action="{{route('subject.delete',['id'=>$data->id,'class_id'=>$data->class_id])}}">
                                                        <div class="modal-body">
                                                            {{__('app.surecall')}} ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{__('app.no')}}</button>
                                                            <button type="submit" class="btn btn-primary">{{__('app.yes')}}</button>
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
                </div>
            </div>
        </div>
        <!--end row-->
    </main>

@endsection
