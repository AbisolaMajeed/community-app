@component('mail::message')

# Dear {{ $data->getAdmin->first_name }},

{{ $data->communityAdmin->community->name }} has been registered successfully!!!

Click <a href="{{config('app.url')}}">here</a> to approve registration.

<br>
Thanks,<br>
{{ config('app.name') }}

@endcomponent