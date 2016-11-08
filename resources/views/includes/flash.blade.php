<div class="container">
    <div class="col-md-10 col-md-offset-1">
        @if(Session::has('flash_message'))
        <div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important': '' }}">
            @if(Session::has('flash_message_important'))
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @endif
            {{ Session::get('flash_message') }}
        </div>
        @endif
    </div>
</div>
