@component('mail::message')
# Introduction

Hi there,

I am {!! $request->name !!}. 

{!! $request->message !!}


Thanks,<br>
{{ $request->name }}
@endcomponent
