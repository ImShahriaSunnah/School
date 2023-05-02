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
                            <h5 class="mb-2 mb-sm-0">{{ __('app.StaffInputList') }}</h5>
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
                                            <td>
                                                @if( app()->getLocale() === 'en')
                                                {{ $data->position_name }}
                                                @else
                                                    {{ $data->position_name_bn }}
                                                @endif
                                            </td>                                            
                                            <td>
                                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                                    <a href="{{ route('school.staff.edit', $data->id) }}"
                                                        class="btn btn-success">{{ __('app.edit') }}</a>

                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$key}}">{{ __('app.delete') }}</button>
                                                </div>
                                            </td>
                                            <div class="modal fade" id="deleteModal{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{ __('app.stafftypedelete') }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="get" action="{{ route('school.staffType.delete', $data->id) }}">
                                                            <div class="modal-body">
                                                                {{__('app.surecall')}} ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"> {{__('app.no')}}</button>
                                                                <button type="submit" class="btn btn-danger"> {{__('app.yes')}}</button>
                                                            </div>
                                                        </form>
        
                                                    </div>
                                                </div>
                                            </div>
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