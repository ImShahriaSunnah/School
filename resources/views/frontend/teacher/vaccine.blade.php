@extends('layouts.teacher.master')
@section('content')
    <main class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card radius-10 shadow-none border mb-0">
                    <div class="card-body">
                        <h5 class="mb-0">My Vaccine Info</h5>
                        <hr>

                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h6 class="mb-0">Teacher VACCINE INFORMATION</h6>
                            </div>
                            @if(isset($vaccine))
                                <div class="card-body">
                                    <form class="row g-3" action="{{route('teacher.vaccine.update',Auth::user()->id)}}" method="post">
                                        @csrf
                                        <div class="col-12">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" value="{{Auth::user()->full_name}}"  disabled>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Birth Certificate No/NID (*)</label>
                                            <input type="number" class="form-control" name="birth_certificate_no" value="{{$vaccine->birth_certificate_no}}"  required>
                                            <input type="hidden" class="form-control" name="id" value="0"  required>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Vaccine Status </label><br>
                                            <input type="radio" id="1st Dose Done" name="vaccine" value="1" {{ ($vaccine->vaccine == 1 )  ? 'checked' :''  }}>
                                            <label for="1st Dose Done" >1st Dose Done </label><br>
                                            <input type="radio" id="2nd Dose Done" name="vaccine" value="2" {{ ($vaccine->vaccine == 2 )  ? 'checked' :''  }}>
                                            <label for="2nd Dose Done" style="margin-top: 5px;">2nd Dose Done</label><br>
                                            <input type="radio" id="3nd Dose Done" name="vaccine" value="3" {{ ($vaccine->vaccine == 3 )  ? 'checked' :''  }}>
                                            <label for="Booster Dose Done" style="margin-top: 5px;">Booster Dose Done</label><br>
                                            <input type="radio" id="Booster Dose Done" name="vaccine" value="0" {{ ($vaccine->vaccine == 0 )  ? 'checked' :''  }}>
                                            <label for="No one" style="margin-top: 5px;">No one</label>
                                        </div>

                                        <div class="text-start text-center">
                                            <button type="submit" class="btn btn-primary px-4">Update Changes</button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <div class="card-body">
                                <form class="row g-3" action="{{route('teacher.vaccine.update',Auth::user()->id)}}" method="post">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" value="{{Auth::user()->full_name}}"  disabled>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Birth Certificate No/NID (*)</label>
                                        <input type="number" class="form-control" name="birth_certificate_no"  required>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Vaccine Status </label><br>
                                        <input type="radio" id="1st Dose Done" name="vaccine" value="1" required>
                                         <label for="1st Dose Done" >1st Dose Done</label><br>
                                        <input type="radio" id="2nd Dose Done" name="vaccine" value="2" required>
                                         <label for="2nd Dose Done" style="margin-top: 5px;">2nd Dose Done</label><br>
                                       <input type="radio" id="3nd Dose Done" name="vaccine" value="3" required>
                                       <label for="Booster Dose Done" style="margin-top: 5px;">Booster Dose Done</label><br>
                                        <input type="radio" id="Buster Dose Done" name="vaccine" value="0" required>
                                        <label for="No one" style="margin-top: 5px;">No one</label>
                                    </div>

                                    <div class="text-start text-center">
                                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
