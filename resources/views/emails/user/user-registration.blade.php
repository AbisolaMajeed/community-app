@component('mail::message')

# Dear {{ $data->user->first_name }},

You have succesfully registered to {{ $data->community->name }}.

Click <a href="{{config('app.url')}}">here</a> to login.

<br>
Thanks,<br>
{{ config('app.name') }}

@endcomponent