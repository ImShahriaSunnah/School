@extends('layouts.school.master')
@push('css')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

@endpush
@section('content')
    <!--start content-->
    <main class="page-content">
        <x-page-title title='Take Attendance'/>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <form class="row g-3" method="get" action="{{route('teacher.attendance.create.show.post.date')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    @include('frontend.layouts.message')
                                </div>
                               
                               
                                
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">{{__('app.date')}} </label>                                               
                                    <input type="text" id="datepicker" class="form-control"  name="date" value="" required>
                                </div>

                        
                                
                                
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary w-100">{{__('app.Show Attendance')}}</button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="lni lni-youtube"></i> Tutorial</button>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </main>

  
@endsection

@push('js')

    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            $("#datepicker").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
            });
        })
   
@endpush
