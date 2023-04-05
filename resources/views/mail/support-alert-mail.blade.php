@component('mail::message')
# Hi Admin

We received a message from support in {{$data['domain']}}.

Customer Name: {{$data['name']}},
Customer Email: {{$data['email']}},
Subject of Mail: {{$data['subject']}},
Message: 

{{$data['message']}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
