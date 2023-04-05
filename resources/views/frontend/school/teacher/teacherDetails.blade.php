@extends('layouts.school.master')

@section('content')
<main class="page-content">
  <div class="row">
    <div class="col-lg-9 mx-auto">
      <hr style="width:100%;text-align:left;margin-left:0;margin-bottom:0;height:5px;background-color:#5c84f6">

      <div class="card">


        <table class="table table-hover table-bordered">

          <tbody>
            
            <tr>
              <td>{{__('app.Name')}}</td>
              <td>{{$data->full_name}} </td>
            </tr>
            <tr>
              <td>{{__('app.Email')}} </td>
              <td>{{$data->email}}</td>
            </tr>
            <tr>
              <td>{{__('app.PhoneNumber')}} </td>
              <td>{{$data->phone}}</td>
            </tr>

            <tr>
              <td>{{__('app.Gender')}} </td>
              <td>{{$data->gender}}</td>
            </tr>
            <tr>
              <td>{{__('app.Nationality')}} </td>
              <td>{{$data->Nationality}}</td>
            </tr>
            <tr>
              <td>{{__('app.sign4')}} </td>
              <td>{{$data->address}}</td>
            </tr>

            <tr>
              <td>{{__('app.Marital')}} </td>
              <td>{{$data->M_status ?? 'Unmarried'}}</td>
            </tr>

            <tr>
              <td>{{__('app.Designation')}} </td>
              <td>{{$data->designation}}</td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
    <div class=" col-xl-3 mx-auto">
      <hr style="width:100%;text-align:left;margin-left:0;margin-bottom:0;height:5px;background-color:#5c84f6">
      <div class="card">
        <div class="mt-10">
          <div style="margin-left:15px; margin-right:15px; margin-top:10px;">
            <center>
              <img class="img-fluid" src="{{asset($data->image?? 'd/no-img.jpg')}}" alt="image">
            </center>
            <br>
            <h6><strong>{{__('app.Name')}} : {{$data->full_name}} </strong></h6>
            <h6><strong>{{__('app.Teacher')}} {{__('app.ID')}} : {{$data->id}} </strong></h6>
            <h6 style="color:red"><strong>{{__('app.Blood')}} {{__('app.Group')}} : {{$data->blood_group}}</strong></h6>

            <h6><strong>{{__('app.Shift')}} : {{$data->shift}}</strong></h6>
            <h6><strong>{{__('app.Department')}} : {{$data->department_name}}</strong></h6>
            <br>
            <div class=" col-xl-3 mx-auto"></div>

            <div class=" col-xl-9 mx-auto">
              <button class="btn btn-primary mb-3" data-bs-target="#exampleModal" data-bs-toggle="modal">{{__('app.Change')}} {{__('app.sign5')}}</button>
              @error('password')<div class="alert alert-danger">{{$message}}</div>@enderror

              <!-- <a href="" data-bs-target="#exampleModal" data-bs-toggle="modal" style="color:red">Change Password</a> -->
            </div>
          </div>
        </div>
      </div>

       <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"> {{__('app.sign5')}} {{__('app.Change')}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{route('change.teacher.pass')}}" method="post">
               
                @csrf

                <div class="row">
                  <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <input type="password" class="form-control" required name="password" id="password" placeholder="{{__('app.sign5')}}">
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <input type="password" class="form-control"required  name="password_confirmation" id="password_confirmation" placeholder="{{__('app.confirm')}} {{__('app.sign5')}}">
                  </div>
                </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('app.close')}}</button>
              <button type="submit" onclick="submitForm()" class="btn btn-primary">{{__('app.Save')}}</button>
            </div>
            </form>
          </div>
        </div>
    </div>

   
   @push('js')
   <script>
function submitForm() {
    $.ajax({
        type: "POST",
        url: "{{ route('change.teacher.pass') }}",
        data: $('#myForm').serialize(),
        success: function (response) {
            $('#exampleModal').modal('hide');
            alert(response.success);
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                var errorMessage = '';
                $.each(errors, function (key, value) {
                    errorMessage += value[0] + '\n';
                });
                alert(errorMessage);
                location.reload(); // Reload the page to clear the input fields and error message
            }
        }
    });
}
</script>
@endpush()
@endsection
     