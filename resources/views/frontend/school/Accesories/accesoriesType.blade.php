@extends('layouts.school.master')

@section('content')


<main class="page-content">
    <center><h1>Accesories</h1></center>
    <div class="row mt-3">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="border p-3">
              <form action="{{route('accesoriesType.post')}}" method="post">
                @csrf
        
                <div class="row">
                  <div class="col-md">
                    <input type="text" class="form-control" name="accesories" placeholder="Accesories Name">
                  </div>
                  <div class="col-md">
                    <input type="number" class="form-control"  name="price" placeholder="Enter Price">
                  </div>

                  <div class="col-md">
                    <button class="btn btn-outline-primary">Create</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      <div class="col">
        <div class="card">
          <div class="card-body">
            <div class="border p-3">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">id</th>
                    <th scope="col">Accesories</th>
                    <th scope="col">Price</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $key => $accesories)
                  <tr>
                    <th>{{++$key}}</th>
                    <td>{{$accesories->accesories}}</td>
                    <td>{{$accesories->price}}</td>
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


