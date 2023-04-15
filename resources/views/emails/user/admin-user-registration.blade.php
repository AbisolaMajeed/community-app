@component('mail::message')

# Dear {{ $data->community_admin->last_name }},

{{ $data->user->first_name }} has succesfully registered to {{ $data->community->name }}.

Click <a href="{{config('app.url')}}">here</a> to login.

<br>
Thanks,<br>
{{ config('app.name') }}

@endcomponent