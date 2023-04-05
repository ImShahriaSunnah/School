@extends('layouts.master')

@section('content')

    <div class="container mt-5">
        <div class="row  border-bottom white-bg dashboard-header">
            <div class="col-md-12">

                <div class="row wrapper border-bottom white-bg page-heading">
                    <div class="col-md-10">
                        <h2>Tutorial</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                <strong>Tutorial</strong>
                            </li>
                        </ol>
                    </div>
                    <div class="col-md-2">

                    </div>
                </div>

                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox ">
                                <div class="ibox-content">

                                    <div class="row justify-content-center">
                                        <div class="col-md-12 b-r">
                                            <h3 class="m-t-none m-b">Feature Menu Create</h3>
                                            <form role="form" action="{{ route('featureDetailsPage.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                              <label>Header Part</label>
                                                <div class="form-group">
                                                    <label>Header Main Text </label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="header_text_1" placeholder="header text 1">
                                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="header_text_2" placeholder="header text 2">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Header Paragraph Text </label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="header_p_text_1" placeholder="header paragraph text 1">
                                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="header_p_text_2" placeholder="header paragraph text 2">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Header Label Text </label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="header_label_text_1" placeholder="header Label text 1">
                                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="header_label_text_2" placeholder="header Label text 2">
                                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="header_label_text_3" placeholder="header Label text 3">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Header Image</label>
                                                    <div class="input-group mb-3">
                                                        <input type="file" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="header_image">
                                                    </div>
                                                </div>
                                              <label>TRACK PROGRESS</label>
                                                <div class="form-group">
                                                    <label>Header Main Text </label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="header_text_2" placeholder="header text 2">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Second Section </label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="header_text_2" placeholder="header text 2">
                                                    </div>
                                                    <label>Second Section Face 1</label>
                                                    <div class="form-group">
                                                        <label>Second Section Face title 1 </label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="second_section_face_title_1" placeholder="second section face header text 1">
                                                        </div>
                                                        <label>Second Section Face Text Area 1 </label>
                                                        <div class="input-group mb-3">
                                                            <textarea name="second_section_face_paragraph_1" class="form-control"></textarea>
                                                        </div>
                                                        <label>Second Section Face Image 1 </label>
                                                        <div class="input-group mb-3">
                                                            <input type="file" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="second_section_face_image_1" placeholder="second section face image 1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Second Section Face 2</label>
                                                    <div class="form-group">
                                                        <label>Second Section Face title 2 </label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="second_section_face_title_2" placeholder="second section face header text 2">
                                                        </div>
                                                        <label>Second Section Face Text Area 2 </label>
                                                        <div class="input-group mb-3">
                                                            <textarea name="second_section_face_paragraph_2" class="form-control"></textarea>
                                                        </div>
                                                        <label>Second Section Face Image 2 </label>
                                                        <div class="input-group mb-3">
                                                            <input type="file" class="form-control" id="basic-url" aria-describedby="basic-addon3" name="second_section_face_image_2" placeholder="second section face image 2">
                                                        </div>
                                                    </div>
                                                </div>
                                                <label>Select Page</label>
                                                <select class="form-control" name="slug">
                                                    @foreach(\App\Models\FeatureMenu::all() as $data)
                                                    <option value="{{$data->menu_slug}}">{{$data->menu_name}}</option>
                                                    @endforeach
                                                </select>
                                                <button class="btn btn-sm btn-primary float-right m-t-n-xs" type="submit">
                                                    <strong>Create</strong>
                                                </button>
                                        </div>
                                        </form>
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
