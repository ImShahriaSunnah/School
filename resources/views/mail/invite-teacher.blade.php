@component('mail::message')
# Hi {{$name}}

In your role as a teacher, you have been assigned the subject for {{$subject}} at {{$school}}.

@component('mail::button', ['url' => 'https://sikkha.cc/login'])
Click here to login at sikkha.cc
@endcomponent

### Using these credentials, you can log in to <a href="https://sikkha.cc/login" target="_blank">Sikkha.cc</a>
Email: {{ $email}} <br>
Password: {{ $password }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
