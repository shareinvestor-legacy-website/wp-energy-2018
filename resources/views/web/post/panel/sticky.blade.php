



<div class="col-sm-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="lead">Sticky Post</p>
            <fieldset class="pb0 mb0">
                <div class="checkbox c-checkbox {{ current_route_matches('PostController@create', 'PostController@edit') ? '' : 'disabled'}}">
                    <label class="needsclick">
                        <input type="checkbox" name="sticky" value="true" {{old('sticky',  @$post->sticky) == true ? 'checked':''}} {{ current_route_matches('PostController@create', 'PostController@edit') ? '' : 'disabled'}}>
                        <span class="fa fa-check"></span>Stick this post to the front page</label>
                </div>
            </fieldset>
        </div>
    </div>
</div>
