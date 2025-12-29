@if(Session::has('flash_message'))
    <h6 class="pb-4 mb-4 border-bottom text-center alert alert-success">
        {{ Session::get('flash_message') }}
    </h6>
@endif

