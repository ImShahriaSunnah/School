@extends('layouts.school.master')
@section('content')
<main class="page-content">

    <div class="container">

    <form action="{{route('id.Card.post')}}" method="post">

        <div class="row">
            <input type="hidden" name="templ_id" id="templ_id">
            @csrf
            @foreach($idCard as $id)
            
            <div class="col-sm-3 mb-3">
                <div class="card" style="cursor:pointer">
                    <div class="card-body" id="imgCard-{{$id->id}}" onclick="selectCard('{{$id->id}}')">
                        <img width="200px" src="{{url('/uploads/idCardFront/'.$id->template)}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Download</button>
    </form>
    </div>
</main>


@endsection
<script>
function selectCard(key) {
    // console.log(key);
    $("#templ_id").val(key);
    document.getElementById("imgCard-"+key).style.backgroundColor = "skyblue";
}
</script>