@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12">
               <div class="card">
               <div class="card-header py-3 bg-transparent">
                       <div class="d-sm-flex align-items-center">
                           <h5 class="mb-2 mb-sm-0">{{__('app.Group')}} {{__('app.Show')}}</h5>
                           <div class="ms-auto">
                               <button type="button" class="btn btn-secondary" onclick="history.back()">{{__('app.Back')}}</button>
                               <a href="{{route('group.create')}}" class="btn btn-primary">{{__('app.Group')}} {{__('app.Create')}}</a>
                               <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="lni lni-youtube"></i> {{__('app.Tutorial')}}</button>

                           </div>
                       </div>
                   </div>
               <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>{{__('app.nong')}}</th>
                        <th>{{__('app.Class')}} {{__('app.Name')}}</th>
                        <th>{{__('app.Group')}} {{__('app.Name')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php 
                        $key1 = 0;    
                    ?>

                    @foreach(\App\Models\InstituteClass::where('school_id', Auth::id())->get() as $key => $class)
                        @if ($class->class_name == "Class Nine" || $class->class_name == "Class Ten" || $class->class_name == "Class Eleven" || $class->class_name == "Class Twelve")
                        <tr>
                            <td>{{ ++$key1 }}</td>
                            <td>{{$class->class_name}}</td>
                            <td>
                                <table class="table table-striped table-bordered">
                                    @foreach(\App\Models\Group::where('class_id',$class->id)->get() as $data)
                                    <tr>
                                        {{-- <td>{{getSectionName($data->section_id)->section_name}}</td> --}}

                                        <td>{{$data->group_name}}</td>
                                        {{-- <td>Status : {{($data->active == 1) ? 'ON' : 'OFF'}}</td> --}}
                                        <td>
                                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                                <a  href="{{route('group.edit',$data->id)}}" class="btn btn-success">{{__('app.Edit')}}</a>
                                                {{--                                <a href="{{route('group.delete',$data->id)}}" class="btn btn-danger">Delete</a>--}}
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$data->id}}">{{__('app.Delete')}}</button>
                                            </div>
                                        </td>
                                        <div class="modal fade" id="deleteModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{__('app.Delete')}} {{__('app.Group')}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="get" action="{{route('group.delete',$data->id)}}">
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
                                    <tr>
                                    @endforeach
                                </table>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
            </div>
        </div>
    </main>

    <?php
    $tutorialShow = getTutorial('group-show');
    ?>
    @include('frontend.partials.tutorial')
@endsection
