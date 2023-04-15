@component('mail::message')

# Dear {{ $data->first_name }},

Your password has been set successfully!!!

Click <a href="{{ config('app.url') }}">here</a> to login.

<br>
Thanks,<br>
{{ config('app.name') }}

@endcomponent