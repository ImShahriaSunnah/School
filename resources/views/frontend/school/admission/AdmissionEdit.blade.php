@extends('layouts.school.master')

@section('content')

<!doctype html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Form Design</title>
  <style>



  </style>
</head>

<body>

  </div>
  <section class="container my-2 bg-dark w-100 text-light p-2">
    <form class="row g-3 p-3" action="{{route('online.Admission.Edit.Post',$edit->id)}}" method="post" enctype="multipart/form-data">
      @csrf

      <center>
        <h1>{{$school->school_name}}</h1>
      </center>
      <div class="col-md-6">
        <label for="validationDefault01" class="form-label">Full name</label>
        <input type="text" class="form-control" placeholder="Write Your Name" value="{{$edit->name}}" name="name" id="validationDefault01">

        @error('name') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>
        <div class="col-md-3"> <label class="form-label">Image</label>
          <div class="input-group mb-3">
            <input type="file" class="form-control" name="image"  placeholder="image">
            <img width="100px" src="{{url('/up',$edit->image)}}" alt="">
          </div>


      </div>
      <div class="col-3">
        <label for="inputAddress" class="form-label">Date of Birh</label>
        <input type="text" class="form-control" value="{{$edit->dob}}"id="dob" placeholder="01-01-2001" name="dob">
        @error('dob') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>
      </div>

      <div class="col-md-3">
        <label for="inputEmail4" class="form-label">Father's Name</label>
        <input type="text" class="form-control" value="{{$edit->f_name}}"placeholder="Father's Name" name="f_name" id="f_name">
        @error('f_name') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>

      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">NID Number</label>
        <input type="text" class="form-control" value="{{$edit->f_nid}}" placeholder="NID Number" name="f_nid" id="f_nid">
        @error('f_nid') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>
      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Occupation</label>
        <input type="text" class="form-control" placeholder="Occupation" value="{{$edit->f_occupation}}" name="f_occupation" id="f_occupation">
        @error('f_occupation') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>
      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Phone</label>
        <input type="text" placeholder="Father Phone Number" value="{{$edit->f_phone}}"class="form-control" name="f_phone" id="f_phone">
        @error('f_phone') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>
      <div class="col-md-3">
        <label for="inputEmail4" class="form-label">Mother's Name</label>
        <input type="text" class="form-control" name="m_name" placeholder="Write your moter name "value="{{$edit->m_name}}" id="m_name">
        @error('m_name') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>

      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">NID Number</label>
        <input type="text" placeholder="Mothers Nid Number" value="{{$edit->m_nid}}" class="form-control" name="m_nid" id="m_nid">
        @error('m_nid') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>

      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Occupation</label>
        <input type="text" class="form-control" placeholder="Mother Occupation" value="{{$edit->m_occupation}}" name="m_occupation" id="m_occupation">
        @error('m_occupation') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>

      <div class="col-md-3">
        <label for="inputPassword4" class="form-label">Phone</label>
        <input type="text" placeholder="Mother Phone Number"value="{{$edit->m_phone}}" class="form-control" name="m_phone" id="m_phone">
        @error('m_phone') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>


      <div class="col-3">
        <div class="gender-details-box">
          <span class="gender-title">Gender</span>
          <div class="gender-category">
            <input type="radio" value="{{$edit->gender}}" name="gender" id="male">
            <label for="male">Male</label>
            <input type="radio" name="gender" id="female">
            <label for="female">Female</label>
            <input type="radio" name="gender" id="other">
            <label for="other">Other</label>
          </div>
        </div>
      </div>



      <div class="col-3">
        <label for="inputAddress2" class="form-label">Blood Group</label>
        <select  class="form-control mb-3 js-select" name="blood_group" class="form-control" value="{{$edit->blood_group}}" id="blood_group" type="text">
          <option value="">Select</option>
          <option value="A+">A+</option>
          <option value="B+">B+</option>
          <option value="A-">A-</option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>

        </select>
        @error('blood_group') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>
      </div>
      <div class="col-3">
        <label for="inputAddress2" class="form-label">Religion</label>
        <select class="form-control mb-3 js-select" name="religion" class="form-control" value="{{$edit->religion}}" id="religion" type="text">
          <option value="">Select</option>
          <option value="Muslim">Muslim</option>
          <option value="Hindu">Hindu</option>
          <option value="Christian">Christian</option>
          <option value="Buddhism">Buddhism</option>
        </select>
        @error('gender') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>
      </div>
      <div class="col-md-3">
        <label for="inputCity" class="form-label">Country of Citizenship</label>
        <input type="text" class="form-control" value="{{$edit->nationality}}" name="nationality" placeholder="nationality" id="nationality">
        @error('nationality') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>

      <div class="col-md-6">

        <label for="inputCity" class="form-label">Present Address</label>

        <textarea ype="text" class="form-control" value="{{$edit->pre_address}}" name="pre_address" placeholder="House No. Street District " id="pre_address"></textarea>
        @error('pre_address') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>
      <div class="col-md-6">

        <label for="inputCity" class="form-label">Parmanent Address</label>

        <textarea ype="text" class="form-control" value="{{$edit->par_address}}" name="par_address" placeholder="House No. Street District " id="par_address"></textarea>
        @error('pre_address') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>

      <div class="col-md-3">
        <label for="inputCity" class="form-label">Family Anual Income</label>
        <input type="text" class="form-control" placeholder="100k" value="{{$edit->income}}" name="income" id="income">
        @error('income') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>
      </div>
      <div class="col-md-3">
        <label for="inputCity" class="form-label">Guardian Name</label>
        <input type="text" class="form-control" placeholder="Mr. S" value="{{old('g_name')}}" name="g_name" id="g_name">
        @error('g_name') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>
      </div>

      <div class="col-md-3">
        <label for="inputCity" class="form-label">Guardian Phone</label>
        <input type="text" class="form-control" placeholder="01+++++++" value="{{$edit->g_phone}}" name="g_phone" id="g_phone">
        @error('g_phone') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>
      </div>
      <div class="col-md-3">
        <label for="inputCity" class="form-label">RelationShip</label>
        <input type="text" class="form-control" value="{{$edit->relation}}" placeholder="Uncle/Anty" name="relation" id="relation">
        @error('relation') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>
      </div>
      <div class="col-md-6">
        <label for="inputCity" class="form-label">Old School</label>
        <input type="text" value="{{$edit->old_school}}" class="form-control" name="old_school" id="old_school" placeholder="Your Old School">
        @error('old_school') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>
      <div class="col-md-3">

        <label for="class" class="form-label">{{__('app.class')}}</label>
        <select name="In_class" class="form-control mb-3 js-select" id="class">
          <option value="">Select</option>
          @foreach($classes as $class)

          <option value="{{$class->id}}">{{$class->class_name}}</option> @endforeach
        </select>
        @error('class') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>
      <div class="col-md-3">
        <label class="form-label">Group</label>
        <select  class="form-control mb-3 js-select" class="form-control mb-3 js-select" name="group" value="{{$edit->group}}" class="form-control" id="">
          <option value="">Select</option>
          <option value="Science">Science</option>
          <option value="Bussines">Bussines Studies</option>
          <option value="Humanities">Humanities</option>

        </select>
        @error('group') <div class="alert alert-danger">{{$message}}</div>@enderror
      </div>


            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </section>
</body>

</html>




@endsection