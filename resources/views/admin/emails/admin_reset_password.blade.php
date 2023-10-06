@component('mail::message')
# Reset Account
Welcome {{ $data['data']->name }}
<br/>

@component('mail::button', ['url' => aurl('reset/password/'.$data['token'])])
Click Here to Reset Your Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
