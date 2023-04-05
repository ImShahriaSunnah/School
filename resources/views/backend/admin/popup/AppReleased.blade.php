@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row  border-bottom white-bg dashboard-header">
        <div class="col-md-12">

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-md-10">
                    <center> <h1>App Released</h1></center>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin')}}">Admin</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Form</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-md-2">
                    <a href="{{route('AppReleased.List')}}" class="btn btn-secondary">Back</a>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-content">

                                <div class="row justify-content-center">
                                    <div class="col-md-6 b-r border">
                                        <h2 class="m-t-none m-b">App Released Pop Up</h2>
                                        @if (!isset($Editdata))
                                        <form  action="{{ route('AppReleased.store')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Version</label>
                                                <div class=" mb-3 ">
                                                    <input type="text" class="form-control input-sm"  name="version" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Note</label>
                                                <div class="input-group mb-3">
                                                    <textarea class="ckeditor" name="note" id="note" cols="60" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-sm btn-primary mb-5" type="submit">
                                                    <strong>Create</strong>
                                                </button>
                                            </div>
                                                
                                            </div>
                                        </form>
                                        @else
                                        <form  action="{{route('AppReleased.Update',$Editdata->id)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label>Version</label>
                                                <div class=" mb-3 ">
                                                    <input value="{{$Editdata->version}}" type="text" class="form-control input-sm"  name="version" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Note</label>
                                                <div class="input-group mb-3">
                                                <textarea class="ckeditor" name="note"id="note" cols="60" rows="10">{{$Editdata->note}}
                                                </textarea>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-sm btn-success mb-5" type="submit">
                                                    <strong>Update</strong>
                                                </button>
                                            </div>
                                                
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"> </script>

    <script>
        CKEDITOR.replace('note');
    </script>

    

@endpush