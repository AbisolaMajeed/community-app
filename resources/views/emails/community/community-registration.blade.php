@component('mail::message')

# Dear {{ $data->communityAdmin->first_name }},

{{ $data->communityAdmin->community->name }} has been registered successfully!!!

Click <a href="{{ url('https://community-app.test/app/set-password/'.encrypt($data->communityAdmin->id)) }}">here</a> to set your password.

<br>
Thanks,<br>
{{ config('app.name') }}

@endcomponent