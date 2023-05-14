{{-- <embed src="{{ asset($document->uploadfile) }}" width="100%" height="600px" /> --}}
<h3>{{$document->title}}</h3>
 <iframe src="{{ asset('uploads/StudentDocument/'.$document->uploadfile) }}" frameborder="0" height="100%" width="100%">
</iframe>