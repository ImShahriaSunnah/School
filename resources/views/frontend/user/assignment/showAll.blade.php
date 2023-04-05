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
                    @foreach($data as $key => $assignment)
                        <a href="{{route('user.upload.assignment', $assignment->id)}}">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <h4 class="mb-1">{{$assignment->title}}</h4>
                                            <p>{{$assignment->description}}</p>
                                        </div>
                                        <div class="ms-auto fs-2 text-primary">
                                            <i class="bi bi-caret-up-fill"></i>
                                        </div>
                                    </div>
                                    <div class="border-top my-2"></div>
                                    <small class="mb-0"><span class="text-success">Deadline <i class="bi bi-arrow-up"></i></span> {{date_format($assignment->updated_at,'M d Y')}}</small>
                                </div>
                            </div>
                        </a>

                    @endforeach
                </div>
            </div>
    </main>
@endsection
