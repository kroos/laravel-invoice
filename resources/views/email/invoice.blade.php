<?php
use App\SalesCustomers;
use App\Customers;
use App\Preferences;
use App\User;
?>

@component('mail::message')

<?php
        // resolve filename to attach
        $scust = SalesCustomers::where(['id_sales' => $sales->id])->first();
        $client = Customers::findOrFail($scust->id_customer);
        $filename = 'Invoice for '.$client->client.'.pdf';

        // resolve sender i.e company
        $comp = Preferences::find(1);
        $sender = $comp->company_name;
        $sender_email = strtolower($comp->company_email);

        $coowner = User::where(['id' => $comp->company_owner])->first();

?>

# Hi {!! $client->client !!}.

Thank you for giving {!! $sender !!} the opportunity to serve you.

Enclosed is our invoice for your purchase.

Please let us know if you have any questions regarding this invoice. We look forward to serve you in the future.

Regards,

{!! ucwords(strtolower($coowner->name)) !!}


encl: {!! $filename !!}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
