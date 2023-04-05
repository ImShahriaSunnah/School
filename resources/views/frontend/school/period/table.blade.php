@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12 mb-5">
               <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">{{__('app.Class')}} {{__('app.Period')}}</h5>
                            <div class="ms-auto">
                                <button type="button" class="btn btn-secondary" onclick="history.back()">{{__('app.Back')}}</button>
                                <a href="{{route('period.create')}}" class="btn btn-primary">{{__('app.Period')}} {{__('app.Create')}}</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="lni lni-youtube"></i> {{__('app.tutorial')}}</button>
                            </div>
                        </div>
                    </div>
                   
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>{{__('app.nong')}}</th>
                                    <th>{{__('app.Shift')}}</th>
                                    <th>{{__('app.Title')}}</th>
                                    <th>{{__('app.Starttime')}}</th>
                                    <th>{{__('app.Endtime')}}</th>
                                    <th>{{__('app.Action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rows as $key => $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>
                                        <span class="badge bg-primary">{{shifting($row->shift)}}</span>
                                    </td>
                                    <td>{{$row->title}}</td>
                                    <td>{{date("h:i A", strtotime($row->from_time))}}</td>
                                    <td>{{date("h:i A", strtotime($row->to_time))}}</td>
                                    <td>
                                        <a  href="{{route('period.edit', $row->id)}}" class="btn btn-success">{{__('app.Edit')}}</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$row->id}}">{{__('app.Delete')}}</button>

                                    </td>
                                    <div class="modal fade" id="deleteModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">{{__('app.Delete')}} {{__('app.Class')}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form method="get" action="{{route('period.delete',$row->id)}}">
                                                    <div class="modal-body">
                                                        {{__('app.surecall')}}  ?
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
    </main>
    
@endsection