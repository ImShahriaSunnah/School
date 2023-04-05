<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <meta name="description" content="{{isset($seo_array['seoDescription']) ? $seo_array['seoDescription'] : "CC School | CodeCell LTD" }}">
   <meta name="keywords" content="{{isset($seo_array['seoKeyword']) ? $seo_array['seoKeyword'] : "CC School | CodeCell LTD" }}">

   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">
   <link rel="icon" href="{{asset('images/favicon.png')}}" type="image/png">

   <!-- CSS here -->
   @include('frontend.partials.style')
   @stack('css')
</head>
<body>

    <div class="col-md-12">
        <h2 class="text-white text-center bg-primary" style="padding: 17px;">CodeCell International School and College</h2>
    </div>
    <div class="container">
      <div class="row" style="margin-top: 13%;">
          <div class="col-md-7 m-auto">
            <h4 for="">Select Term</h4>
            <form action="{{ route('show.term.wise.result') }}" method="post">
              @csrf
              <input type="hidden" name="studentId" value="{{ $student->unique_id }}">
                <div class="card">
                  <div class="card-body">
                        <div class="col-md-12">
                          <select  class="form-control mb-3 js-select"  name="term_id" aria-label="Default select example">
                            <option selected>Select Term</option>
                            @foreach ($terms as $term)
                              <option value="{{ $term->id }}">{{ $term->term_name }}</option>
                            @endforeach
                          </select>
                        </div>
                  </div>
                </div>

                <div class="col md-12 mt-3">
                  <button type="submit" class="btn btn-outline-primary" style="width: 100%;">Show Result</button>
                </div>
            </form>
          </div>
      </div>
    </div>

     <!-- JS here -->
   @include('sweetalert::alert')
   @include('frontend.partials.scripts')
  @stack('js')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>