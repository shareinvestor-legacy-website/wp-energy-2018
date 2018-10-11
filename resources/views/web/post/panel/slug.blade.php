<div class="col-sm-4">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">Slug</p>

            <fieldset>
                <div class="form-group">

                    @if (current_route_matches('PostController@createTranslation','PostController@editTranslation' ))
                        <input type="text" class="form-control" name="slug"
                               value="{{ @$post->slug}}"
                               disabled/>
                    @else
                        <div class="input-group m-b">

                            <input type="text" class="form-control" name="slug"
                                   value="{{old('slug', @$post->slug ) }}"/>
                        </div>
                    @endif
                </div>
            </fieldset>


        </div>

    </div>
</div>
