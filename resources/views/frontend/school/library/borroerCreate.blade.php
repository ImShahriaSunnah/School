@extends('layouts.school.master')

@section('content')
    <main class="page-content">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <h2 style="margin:10px; text-align:center; ">New Record</h2>
                    @if (\Session::has('insert'))
                        <div id="" class="alert alert-success">
                            {!! Session::get('insert') !!}
                        </div>
                    @endif
                    <!-- error message  -->
                    @if (\Session::has('error'))
                        <div id="" class="alert alert-danger">
                            {!! Session::get('error') !!}
                        </div>
                    @endif

                    <div class="row">

                        <div class="col-xl-12">


                            <div style="margin: 20px;">
                                <form class="row g-3" method="post" action="{{ route('borrower.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <!-- relation of book and Subject -->
                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <label class="form-label">{{ __('app.Book_name') }}</label>
                                                <select class="form-control mb-3 js-select" id="book_id" name="book_id">
                                                    <option value="" selected>{{ __('app.select') }}</option>
                                                    @foreach ($books as $book)
                                                        <option value="{{ $book->id }}">{{ $book->book_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6" id="group-select">
                                                <label class="form-label">{{ __('app.member') }}</label>
                                                <select class="form-control mb-3 js-select" id="Student_id" name="student_id">
                                                    <option value="" selected> {{ __('app.select') }}</option>
                                                    @foreach ($students as $student)
                                                        <option value="{{ $student->id }}">{{ $student->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>{{ __('app.borrow_date') }}</label>
                                                <input type="date" id="borrow_date" class="form-control" placeholder=""
                                                    name="borrow_date" value="{{ $defaultDate }}" required>
                                                @error('borrow_date')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label>{{ __('app.p_return_date') }}</label>
                                                <input type="date" id="return_date" class="form-control" placeholder=""
                                                    name="possible_borrow_date" required>
                                                @error('possible_borrow_date')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>


                                        </div>

                                    </div>


                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">{{ __('app.submit') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                        </div>


                    </div>

                </div>
            </div>
        </div>


    </main>
@endsection
@push('js')
    <script type="text/javascript">
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();
            var maxDate = year + '-' + month + '-' + day;
            $('#borrow_date').attr('min', maxDate);
        });
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();
            var maxDate = year + '-' + month + '-' + day;
            $('#return_date').attr('min', maxDate);
        });
    </script>
@endpush
