@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">

                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">{{ $studentText }} Form</h6>
                            <hr />
                            @if (!isset($feesEdit))
                                <form class="row g-3" method="post" action="{{ route('school.staff.create.post') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-md-12">
                                        @include('frontend.layouts.message')
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Position Name</label>
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">Position Name</span>
                                            <input type="text" class="form-control" placeholder="Position Name"
                                                name="position_name" value="{{old('position_name')}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form class="row g-3" method="post"
                                    action="{{ route('school.staff.update', $feesEdit->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Position Name</label>
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">Position Name</span>
                                            <input type="text" class="form-control" placeholder="Fees Title"
                                                name="position_name" value="{{ $feesEdit->position_name }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </main>
@endsection
