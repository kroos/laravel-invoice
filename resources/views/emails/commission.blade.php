@component('mail::message')
{!! App\Users::findOrFail(request('id_user'))->name !!}'s Commission.

Attached are the report of your sales for month ________


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
The Management of Ayus Line Sdn Bhd,<br>
Department Of Account ({{ config('app.name') }})
@endcomponent
