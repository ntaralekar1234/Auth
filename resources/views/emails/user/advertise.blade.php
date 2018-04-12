@component('mail::message')
# Osangli.com

{{ $admessage }}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

<a href="https://www.Osangli.com"><img src="https://bootdey.com/img/Content/Manbrown2.png"></a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
