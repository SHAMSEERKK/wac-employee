@component('mail::message')
Hi,{{ $add->name }}
<br>
<P>Email id : {{ $add->email }}
</P>


@component('mail::button', ['url' => ''])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
