@extends('layouts.school.master')

@push('css')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    
@endpush

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-head">
                        <div class="mt-1 p-3">
                            <center><h5> Use only all this Row in Excel file</h5></center>
                            <hr>

                            <p class="mt-1 text-center"><strong>name,email,phone,roll_number,dob,gender,blood_group,fathers_name,mothers_name,address,password,shift(1,2,3)</strong></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">Student Upload Form</h6>
                           
  
                            <form class="row g-3"  method="post" id="upload-form" action="{{route('student.upload.post')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    @include('frontend.layouts.message')
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="file">class </label>
                                        <select class="form-control mb-3 js-select" aria-label="Default select example" name="class_id" id="class_id" onchange="loadSection()" required>
                                            <option selected="">{{__('app.Class')}} {{__('app.Name')}}</option>
                                            @foreach($class as $data)
                                                <option value="{{$data->id}}" {{ (old('class_id') == $data->id) ? 'selected' : ''}}>{{$data->class_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                     <br>
                                     <div class="col-md">
                                        <label>{{__('app.Section')}} {{__('app.Name')}}</label>
                                        <select class="form-control mb-3 js-select" id="section_id" name="section_id"  required>
                                            <option selected>Select one</option>
                                         </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="file">Select Excel File</label>
                                        <input type="file" class="form-control-file" id="file" name="file" required>
                                    </div>

                                    <br>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" id="submit-button" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @if (Session::has('import errors'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach(Session::get('import errors') as $failure)
                                    <li>{{ $failure->errors()[0]}} at line no {{ $failure->row()}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
 

@endsection

@push('js')

    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    

     

<script>
        @if(old('class_id'))
            loadSection();
        @endif

        @if (isset($studentEdit))
            loadSection();
        @endif
      // $("#upload-form").submit(function(e){
        //     e.preventDefault();

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });

        //     $.ajax({
        //         url: "{{route('student.upload.post')}}",
        //         type: "POST",
        //         contentType: false,
        //         cache: false,
        //         processData: false,
        //         data: $("#upload-form").serialize(),
        //         beforeSend: function(){
        //             $("#submit-button").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...`);
        //         },
        //         success: function(resp){
        //             console.log(resp);
        //             $("#submit-button").html("Submit");
        //         },
        //         error: function(error){
        //             console.log(error);
        //             $("#submit-button").html("Submit");
        //         }
        //     })
        // });
        function loadSection() {
            let class_id = $("#class_id").val();
            
            

            $.ajax({
                url:'{{route('admin.show.section')}}',
                method:'POST',
                data:{
                    '_token':'{{csrf_token()}}',
                    class_id:class_id
                },

                success: function (response) {
                    // console.log(response.class.class_name);
                    
                    $('#section_id').html(response.html);
                    
                    if(response.group == 1)
                    {
                        $("#group-select").html(groupElement);
                    }
                    else
                    {
                        $("#group-select").html('');
                    }
                }
            });

        }
    </script> 


    
@endpush

