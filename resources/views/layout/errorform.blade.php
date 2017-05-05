<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        @if(count($errors) > 0 )
        <ul class="list-group">
            @foreach($errors->all() as $err)
            <li class="list-group-item list-group-item-danger">
                {!! $err !!}
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>