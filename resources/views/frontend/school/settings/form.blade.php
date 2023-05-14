@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">{{__('app.Device Settings')}}</h6>
                            <hr/>
                            <form method="post" action="{{route('device.update')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    @include('frontend.layouts.message')
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{__('Device Address')}}</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        name="device_address"
                                        value="{{Auth::user()->device_address}}"
                                        placeholder="XXXXXXXXXXXXXX"
                                    />

                                    @error('device_address')
                                        <span class="text-danger">
                                            <strong> {{$message}} </strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{__('Device Username')}}</label>
                                    <input 
                                        type="text" 
                                        class="form-control"
                                        name="device_username"
                                        value="{{Auth::user()->device_username}}"
                                        placeholder="username"
                                    />

                                    @error('device_username')
                                        <span class="text-danger">
                                            <strong> {{$message}} </strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <button class="btn btn-primary">{{__('app.save')}}</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 text-center">
                        <img src="{{asset('d/stellar_device.png')}}" class="img-fluid" width="90" alt="zkteco">
                    </div>
                </div>
            </div>
        </div>
        
        <!--end row-->
    </main>

@endsection

@push('js')
    <script>
        function game_chf() {
            let class_id = $("#class_id").val();
            //   console.log(class_id,'sports');
            $.ajax({
                url:'{{route('admin.show.section')}}',
                method:'POST',
                data:{
                    '_token':'{{csrf_token()}}',
                    class_id:class_id
                },

                success: function (response) {
                    $('#section_id').html(response);
                }
            });

        }

        function group_chf() {
            let class_id = $("#class_id").val();
            let section_id = $("#section_id").val();
            console.log(section_id,'sports-section');
            $.ajax({
                url:'{{route('admin.show.group')}}',
                method:'POST',
                data:{
                    '_token':'{{csrf_token()}}',
                    class_id:class_id,
                    section_id:section_id,
                },

                success: function (response) {
                    $('#group_id').html(response);
                }
            });

        }

    </script>
@endpush