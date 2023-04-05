@extends('layouts.school.master')

@section('content')

<main class="page-content">


  <form action="{{route('id.card.type.post')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div>
      <label for="">Template</label>
      <input type="file" placeholder="" value="{{old('template')}}" class="form-control" required name="template">



    </div>

    <div>
      <label for=""> Null Template</label>
      <input type="file" placeholder="" value="{{old('null_template')}}" class="form-control" required name="null_template">



    </div>
    <div>
      <label for="">Back Template</label>
      <input type="file" placeholder="" value="{{old('back_template')}}" class="form-control" required name="back_template">



    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>



</main>


@endsection