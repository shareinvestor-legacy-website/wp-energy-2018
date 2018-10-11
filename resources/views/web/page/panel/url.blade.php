@if (isset($page))

    <div class="col-sm-12">
        <div class="panel panel-default">

            <div class="panel-body">

                <p class="lead">URL</p>
                <fieldset>
                    <div class="form-group">
                        <label class="control-label">Permanent Link</label>
                        <div class="form-inline">
                            <p class="form-control-static"><a href="{{url("$locale/".$page->path)}}"
                                                              target="_blank">{{url("$locale/".$page->path)}}</a>
                            </p>
                        </div>
                    </div>
                </fieldset>


                <fieldset>
                    <div class="form-group">
                        <label class="control-label">Slug</label>
                        @if (current_route_matches('PageController@createTranslation','PageController@editTranslation' ))
                            <input type="text" class="form-control" name="slug"
                                   value="{{ implode('/', array_filter([$page->basePath('slug'), $page->slug]))}}"
                                   disabled/>
                        @else
                            <div class="input-group m-b">

                                @if (!empty($page->basePath('title')))
                                    <span class="input-group-addon">{{$page->basePath('slug')}}
                                        /</span>
                                @endif
                                <input type="text" class="form-control" name="slug"
                                       value="{{old('slug', $page->slug ) }}"/>
                            </div>
                        @endif
                    </div>
                </fieldset>


                <fieldset class="mb0 pb0">

                    <div class="form-group">
                        <label class="control-label">External Url</label>
                        <div class="row">

                            <div class="col-sm-8 col-xs-8">
                                <input type="text" class="form-control"
                                       placeholder="Absolute Path or Absolute Url"
                                       name="external_url"
                                       value="{{old('external_url', @$page->{"external_url:$locale"})}}">
                            </div>

                            <div class="col-sm-4 col-xs-4">
                                <select class="form-control" name="external_url_target">
                                    <option value="_self">Target</option>
                                    <option value="_blank" {{@$page->{"external_url_target:$locale"} === "_blank" ? 'selected':''}}>
                                        _blank
                                    </option>
                                    <option value="_self" {{@$page->{"external_url_target:$locale"} === "_self" ? 'selected':''}}>
                                        _self
                                    </option>
                                    <option value="_parent" {{@$page->{"external_url_target:$locale"} === "_parent" ? 'selected':''}}>
                                        _parent
                                    </option>
                                    <option value="_top" {{@$page->{"external_url_target:$locale"} === "_top" ? 'selected':''}}>
                                        _top
                                    </option>
                                </select>
                            </div>

                        </div>
                        <span class="help-block">Set optional external link related to page, if target is not selected, default is _self.</span>
                    </div>
                </fieldset>

            </div>
        </div>
    </div>
@endif
