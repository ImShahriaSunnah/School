@extends('layouts.school.master')

@section('content')
    <main class="page-content">
        <div class="row">
            @foreach($addons as $addon)
            <div class="col-xl-3">
                
                        <div class="card radius-10 shadow p-3 mb-5 bg-body rounded hover-zoom">
                        <div class="card-body p-0">
                            
                            <hr >
                            
                              <div class=" ">
                                      
                                      <center><p class="mb-2 text-black" style="font-size: 24px"> {{$addon->title}}</p></center>
                                      <center><h3 class="mb-2 text-black">{{$addon->price}}  ৳</h3></center>
                                      <center><h5 class="mb-2 text-black">{{$addon->month}} {{__('app.Month')}}</h5></center>
                              </div>
                            
                            <hr>
                            <div class="col text-center">
                            <button class="btn btn-primary" onclick="showModal('{{ $addon->id }}')">Purchase</button>

                            </div>
                        </div>
                    </div>
                

            </div>
            @endforeach
        </div>
    </main>




        <!-- Modal -->
        <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="height: 700px;">  <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0 m-0">

                </div>
            </div>
        </div>
    </div>
<script>
    function showModal(id) {
        
         //console.log(addoncheckoutinfo);

        $.ajax({
            url: '/Addon/Checkout/School',
            type: "POST",
            data: { 
                "_token"    : "{{csrf_token()}}",
                addon_package_id: id 
            },
            success: function(response) {
                console.log(response);
                // update modal content
                $('#myModal .modal-body').html(response);
                // show modal
                $('#myModal').modal('show');
            },
            error: function(error){
                console.log(error);
            }
        });
    }
</script>
{{-- <script>
    function showModal(id) {
        $.ajax({
            url: '/Addon/Checkout/School/' + id, 
            type: 'GET',
            success: function(response) {
                // Update the modal content with the fetched HTML
                $('#myModal .modal-content').html(response);
                // Show the modal
                $('#myModal').modal('show');
            }
        });
    }
</script> --}}
@endsection



