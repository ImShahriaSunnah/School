@extends('layouts.school.master')

@section('content')


<main class="page-content">

    <form>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title">{{__('app.book_list')}}</h5>
                        </center>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#book">
                            {{__('app.Add_book')}}
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#booktype">
                            {{__('app.Add_type')}}
                        </button>
                        <form action="">
                            <!-- <div class="card-body"> -->

                            <!-- <div class="card-body table-responsive"> -->

                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__('app.Id')}}</th>
                                        <th scope="col">{{__('app.Book_name')}}</th>
                                        <th scope="col">{{__('app.Author_name')}}</th>
                                        <th scope="col">{{__('app.rack')}}_</th>
                                        <th scope="col">{{__('app.quantity')}}</th>
                                        <th scope="col">{{__('app.available')}}</th>
                                        <th scope="col">{{__('app.image')}}</th>
                                        <th colspan="2">{{__('app.action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($allData as $key=>$data)
                                        <th scope="row">{{$key++ +1}}</th>
                                        <td>{{$data->book_name}}</td>
                                        <td>{{$data->author_name}}</td>
                                        <td>{{$data->rack_no}}</td>
                                        <td>{{$data->quantity}}</td>
                                        <td>{{$data->available}}</td>
                                        <td> <img width="50px" src="{{asset('uploads/library/'.$data->image)}}" alt="img not added"></td>
                                        <td>


                                            <a class="btn btn-success" href="{{route('books.edit',$data->id)}}"><i class="bi bi-pencil-square"></i></a>
                                            <button type="button" class="btn btn-danger" onclick="if(confirm('Are You sure?')){ location.replace('{{route('books.delete',$data->id)}}') }">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- </div> -->
                            <!-- </div>    -->
                        </form>

                    </div>
                </div>
            </div>
        </div>
</main>





<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="book" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('app.newBook')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @if(\Session::has('insert'))
                            <div id="" class="alert alert-success">
                                {!!Session::get('insert')!!}
                            </div>
                            @endif
                            <!-- error message -->
                            @if(\Session::has('error'))
                            <div id="" class="alert alert-danger">
                                {!!Session::get('error')!!}
                            </div>
                            @endif

                            <form action="{{route('books.create.post')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1">{{__('app.Book_name')}}</label>
                                    <input type="text" class="form-control" value="{{old('book_name')}}" name="book_name" id="book_name">
                                    @error('book_name')<div class="alert alert-danger">{{$message}}</div>@enderror

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">{{__('app.Book_type')}}</label>
                                    <select class="form-select mb-3" name="book_type_id" id="book_type_id" value="{{old('book_type_id')}}" class="form-control">
                                        <option value="">{{__('app.select')}}</option>
                                        @foreach($bookType as $book)
                                        <option value="{{$book->id}}">{{$book->book_type}}</option>
                                        @endforeach
                                    </select>
                                    @error('book_type')<div class="alert alert-danger">{{$message}}</div>@enderror

                                </div>
                                <div class="form-group">
                                    <label for="author_name">{{__('app.Author_name')}}</label>
                                    <input type="text" class="form-control" value="{{old('author_name')}}" id="author_name" name="author_name">
                                    @error('author_name')<div class="alert alert-danger">{{$message}}</div>@enderror

                                </div>
                                <div class="form-group">
                                    <label for="rack_no">{{__('app.rack')}}</label>
                                    <input type="number" class="form-control" value="{{old('rack_no')}}" name="rack_no" id="rack_no" placeholder="Rack No">
                                    @error('rack_no')<div class="alert alert-danger">{{$message}}</div>@enderror

                                </div>
                                <div class="form-group">
                                    <label for="rack_no">{{__('app.quantity')}}</label>
                                    <input type="number" class="form-control" value="{{old('quantity')}}" name="quantity" id="quantity" placeholder="Quantity">
                                    @error('quantity')<div class="alert alert-danger">{{$message}}</div>@enderror

                                </div>
                                <div class="form-group">
                                    <label for="rack_no">{{__('app.available')}}</label>
                                    <input type="number" class="form-control" value="{{old('available')}}" name="available" id="available" placeholder="Quantity">
                                    @error('available')<div class="alert alert-danger">{{$message}}</div>@enderror

                                </div>
                                <div class="form-group">
                                    <label for="image">{{__('app.image')}}</label>
                                    <input type="file" accept="image/*" class="form-control" value="{{old('image')}}" name="image" id="image" placeholder="image">
                                    @error('image')<div class="alert alert-danger">{{$message}}</div>@enderror

                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">{{__('app.submit')}}</button>

                            </form>

                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
</div>







<!-- Modal -->
<div class="modal fade" id="booktype" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('app.Book_type')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('books.type.post')}}" method="post">
                    @csrf

                    <div>
                        <label for="">{{__('app.Book_type')}}</label>
                        <input type="book_type" value="{{old('book_type')}}" class="form-control" required name="book_type">

                    </div>


            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary">{{__('app.save')}}</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#booktypeList">
                    Book List
                </button>
            </div>
        </div>
        </form>
    </div>
</div>





<div class="modal fade" id="booktypeList" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Book List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">


            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">{{__('app.Id')}}</th>
                                        <th scope="col">Book Type</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($bookType as $key=>$data)
                                        <th scope="row">{{$key++ +1}}</th>
                                        <td>{{$data->book_type}}</td>
                               <td>
                                        <button type="button" class="btn btn-danger" onclick="if(confirm('Are You sure?')){ location.replace('{{route('books.type.delete',$data->id)}}') }">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>

                                        </td>
                                    </tr>
                                    @endforeach

            </div>
        </div>


        @endsection