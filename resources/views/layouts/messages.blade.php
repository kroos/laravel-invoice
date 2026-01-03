@include('layouts.nojavascript')
@include('layouts.sessionsuccess')
@include('layouts.sessionerrors')
@include('layouts.sessionalerts')

@if(isset($errors))
	@include('layouts.error-messages')
@endif
