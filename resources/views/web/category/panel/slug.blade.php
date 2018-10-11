<div class="col-sm-4">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">Slug</p>

            <fieldset>
                <div class="form-group">

                    @if (current_route_matches('CategoryController@createTranslation','CategoryController@editTranslation' ))
                        <input type="text" class="form-control" name="slug"
                               value="{{ implode('/', array_filter([$category->basePath('slug'), $category->slug]))}}"
                               disabled/>
                    @else
                        <div class="input-group m-b">

                            @if (!empty($category->basePath('name')))
                                <span class="input-group-addon">{{$category->basePath('slug')}}/</span>
                            @endif
                            <input type="text" class="form-control" name="slug"
                                   value="{{old('slug', $category->slug ) }}"/>
                        </div>
                    @endif
                </div>
            </fieldset>


        </div>

    </div>
</div>
