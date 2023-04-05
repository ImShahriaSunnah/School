@extends('layouts.school.master')

@section('content')
    <!--start content-->
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">{{ __('app.StaffInputCreate') }}</h5>
                            <div class="ms-auto">
                                <button type="button" class="btn btn-secondary" onclick="history.back()">{{ __('app.back') }}
                                </button>
                                <a href="{{ route('school.staff.create') }}"
                                    class="btn btn-primary">{{ __('app.staffTypeCreate') }}</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="lni lni-youtube"></i>
                                    {{ __('app.Tutorial') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('app.n') }}</th>
                                        <th>{{ __('app.PositionName') }}</th>
                                        <th>{{ __('app.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fees as $key => $data)
                                        <tr>
                                            <td>{{ $key++ + 1 }}</td>
                                            <td>{{ $data->position_name }}</td>
                                            <td>
                                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                                    <a href="javascript::"
                                                        class="btn btn-success"
                                                        onclick="if(confirm('Are you sure?')){location.replace('{{ route('school.staff.edit', $data->id) }}')}"
                                                    >{{ __('app.edit') }}</a>

                                                    <a href="javascript::"
                                                        onclick="if(confirm('Are you sure?')){location.replace('{{ route('school.staff.delete', $data->id) }}')}"
                                                        class="btn btn-danger"
                                                    >{{ __('app.delete') }}</a>
                                                </div>
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
    <?php
    $tutorialShow = getTutorial('staff-type-show');
    ?>
    @include('frontend.partials.tutorial')
@endsection
