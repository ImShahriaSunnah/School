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
                                    <label class="form-label">{{__('app.Device IP Address')}}</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        name="zk_ip_address"
                                        value="{{Auth::user()->zk_ip_address}}"
                                        placeholder="192.168.0.123"
                                    />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">{{__('app.IP Port')}}</label>
                                    <input 
                                        type="text" 
                                        class="form-control"
                                        name="zk_ip_port"
                                        value="{{Auth::user()->zk_ip_port}}"
                                        placeholder="4370"
                                    />
                                </div>
                                
                                <button class="btn btn-primary">{{__('app.save')}}</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 text-center">
                        <img src="{{asset('images/zk-teco.jpg')}}" class="img-fluid" alt="zkteco">
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