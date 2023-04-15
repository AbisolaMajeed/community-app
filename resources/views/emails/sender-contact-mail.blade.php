@component('mail::message')

Dear {{$data['name']}},
<br>

We just received your message. Thank you very much for writing to us. 
<br>
We are working on your request and will get in touch as soon as possible. 
<br>
If you have any urgent issues, please contact our staff by phone - +1 5589 55488 55. We are happy to offer you our assistance. 


<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent