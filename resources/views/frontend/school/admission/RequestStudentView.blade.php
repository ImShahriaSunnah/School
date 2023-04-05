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
              <td>Applicant Id</td>
              <td>{{$data->id}} </td>
            </tr>
            <tr>
              <td>Name</td>
              <td>{{$data->name}} </td>
            </tr>
            <tr>
              <td>Date of Birth </td>
              <td>{{$data->dob}}</td>
            </tr>
            <tr>
              <td>Father's Name</td>
              <td>{{$data->f_name}} </td>
            </tr>
            <tr>
              <td>Occupation </td>
              <td>{{$data->f_occupation}}</td>
            </tr>
            <tr>
              <td> Father's NID Number </td>
              <td>{{$data->f_nid}}</td>
            </tr>
            <tr>
              <td> Father's Phone </td>
              <td>{{$data->f_phone}}</td>
            </tr>
            <tr>
              <td>Mother's Name</td>
              <td>{{$data->m_name}} </td>
            </tr>
            <tr>
              <td>Occupation </td>
              <td>{{$data->m_occupation}}</td>
            </tr>
            <tr>
              <td> Mother's Phone </td>
              <td>{{$data->m_phone}}</td>
            </tr>
            <tr>
              <td> Mother's NID Number </td>
              <td>{{$data->m_nid}}</td>
            </tr>
           
            <tr>
              <td>Religion </td>
              <td>{{$data->religion}}</td>
            </tr>

            <tr>
              <td>Gender </td>
              <td>{{$data->gender}}</td>
            </tr>
            <tr>
              <td>Nationality </td>
              <td>{{$data->nationality}}</td>
            </tr>
            <tr>
              <td>Present Address </td>
              <td>{{$data->pre_address}}</td>
            </tr>
            <tr>
              <td>Parmanent Address </td>
              <td>{{$data->par_address}}</td>
            </tr>
            <tr>
              <td> Guardian Name</td>
              <td>{{$data->g_name}}</td>
            </tr>
            <tr>
              <td>  Guardin Phone</td>
              <td>{{$data->g_phone}}</td>
            </tr>
            <tr>
              <td>  Guardin Relation</td>
              <td>{{$data->relation}}</td>
            </tr>
            <tr>
              <td> Old School</td>
              <td>{{$data->old_school}}</td>
            </tr>
            <tr>
              <td>Group</td>
              <td>{{$data->group}}</td>
            </tr>
            <tr>
              <td>Monthly Family Income</td>
              <td>{{$data->income}}</td>
            </tr>
          </tbody>
        </table>
      </div>




    </div>
    <div class=" col-xl-3 mx-auto">
      <hr style="width:100%;text-align:left;margin-left:0;margin-bottom:0;height:5px;background-color:#5c84f6">
      <div class="card">
        <div class="mt-10">
          <div style="margin-left:15px; margin-top:10px;">
            <center>
              <img width="100px" src="{{url('/up/'.$data->image)}}" alt="">
            </center>
            <br>
            <h6><strong>Name: {{$data->name}} </strong></h6>
            <h6 style="color:red"><strong>Blood Gorup :{{$data->blood_group}}</strong></h6>
            <h6><strong>Class:{{$data->in_class}}</strong></h6>

        </div>
      </div>
      @endsection
     </form>
          </div>
        </div>
      </div>

     