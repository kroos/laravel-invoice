<div class="row">
    <div class="col-sm-8 col-sm-offset-2">

        @if(Session::has('flash_message'))
        <div class="alert alert-success">
            {{ Session::get('flash_message') }}
        </div>
        @endif
   </div>
</div>