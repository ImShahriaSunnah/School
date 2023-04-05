@extends('layouts.school.master')

@section('content')
    <main class="page-content">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div id="meet"/>
            </div>
        </div>
    </main>
    @push('js')
        <script src='https://meet.jit.si/external_api.js'></script>
        <script type="text/javascript">
            var meetName = "<?php echo $teacher->link_id; ?>";
            var meetEmail = "<?php echo Auth::user()->email; ?>";
            var meetDisplayName = "<?php echo Auth::user()->school_name; ?>";
            function codeAddress(){
                const domain = 'meet.jit.si';
                const options ={
                    roomName: meetName,
                    width:700,
                    height :700,
                    parentNode:document.querySelector('#meet'),
                    userInfo:{
                        'email':meetEmail,
                        'displayName':meetDisplayName,
                    }
                };
                const api = new JitsiMeetExternalAPI(domain, options);
            }
            window.onload = codeAddress;
        </script>
    @endpush
@endsection


