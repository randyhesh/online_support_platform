@component('mail::message')

    Smart Support Agent Replyed to your ticket Ref. no {{ $refenrence_no }}<br>
    "<b>{{ $reply }}</b>"

    Thanks,
    {{ config('app.name') }}
@endcomponent
