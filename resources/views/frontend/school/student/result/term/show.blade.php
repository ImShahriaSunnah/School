@extends('layouts.school.master')

@section('content')
    @push('cs')
        <style>

        </style>
    @endpush
    <!--start content-->
    <!--start content-->
    <main class="page-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">{{ __('app.t') }}</h5>
                            <div class="ms-auto">
                                <button type="button" class="btn btn-secondary"
                                    onclick="history.back()">{{ __('app.back') }}</button>
                                <a href="{{ route('term.create') }}" class="btn btn-primary">{{ __('app.Term_Create') }}</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="lni lni-youtube"></i> Tutorial</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{ __('app.no') }}</th>
                                        <th>{{ __('app.term') }}</th>
                                        <th>{{ __('app.tMark') }}</th>
                                        <th>{{ __('app.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rows as $key => $data)
                                        <tr>
                                            <td>{{ $key++ + 1 }}</td>
                                            <td>
                                                @if( app()->getLocale() === 'en')
                                                {{ $data->term_name }}
                                            @else
                                                {{ $data->term_name_bn }}</td>
                                            
                                            @endif
                                            </td>
                                            <td>{{ $data->total_mark }}</td>
                                            <td>
                                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                                    <a href="{{ route('term.edit', $data->id) }}"
                                                        class="btn btn-success">{{ __('app.edit') }}</a>
                                                    {{--                                            <a href="{{route('class.delete',$data->id)}}" class="btn btn-danger">Delete</a> --}}
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal{{ $data->id }}">{{ __('app.delete') }}</button>
                                                </div>
                                            </td>
                                            <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true"
                                                style="display: none;">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                {{ __('app.d_class') }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form method="get" action="{{ route('term.delete', $data->id) }}">
                                                            <div class="modal-body">
                                                                {{ __('app.Are_you_sure') }}?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-bs-dismiss="modal">{{ __('app.no') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">{{ __('app.yes') }}</button>
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
    $tutorialShow = getTutorial('class-show');
    ?>
    @include('frontend.partials.tutorial')
@endsection
@push('js')
@endpush