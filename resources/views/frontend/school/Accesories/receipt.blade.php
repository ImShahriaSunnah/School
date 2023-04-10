@extends('layouts.school.master')

@section('content')


<main class="page-content">
  <center>
    <h1>Accesories History</h1>
  </center>




  <div class="col">
    <div class="card">
      <div class="card-body">
        <div class="border p-3">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">roll</th>
                <th scope="col">class</th>
                <th scope="col">section</th>
                <th scope="col">Totall</th>
                <th scope="col">Action</th>



              </tr>
            </thead>
            <tbody>
              @foreach($data as $key => $accesories)
              <tr>
                <th>{{++$key}}</th>
                <td>{{$accesories->name}}</td>
                <td>{{$accesories->roll}}</td>
                <td>{{$accesories->class}}</td>
                <td>{{$accesories->section}}</td>
                <td>{{$accesories->amount}}</td>
                <td>
                  <button type="button" class="btn btn-danger" onclick="if(confirm('Are You sure?')){ location.replace('{{route('receipt.delete',$accesories->id)}}') }">
                    <i class="bi bi-trash-fill"></i>
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
</main>

@endsection