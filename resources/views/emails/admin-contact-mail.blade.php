@component('mail::message')

# {{$data['subject']}}


{{$data['message']}}

Thanks,<br>
{{$data['name']}}
@endcomponent