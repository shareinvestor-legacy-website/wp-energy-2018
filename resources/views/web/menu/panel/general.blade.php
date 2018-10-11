<div class="col-sm-8">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">General</p>


            <fieldset>

                <div class="form-group  {{ error_has('name') ? 'has-error':'' }}">
                    <label class="control-label">Name</label>
                    <input type="text" class="form-control" name="name"
                           value="{{old('name', @$menu->{"name:$locale"})  }}">
                    @include('component.error-message', ['field' => 'name'])
                </div>
            </fieldset>


            <fieldset>
                <div class="form-group">
                    <label class="control-label">Parent</label>
                    <select class="form-control menu"
                            name="parent_id" {{ current_route_matches('MenuController@create', 'MenuController@edit') ? '' : 'disabled'}}>
                        <option value="">None</option>
                        @foreach ($selectableMenus as $selectableMenu)

                            <option
                                value="{{$selectableMenu->id}}" {{@($menu->parent_id === $selectableMenu->id) ? 'selected':'' }}>{{$selectableMenu->display_path  }}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>


            @if (isset($menu))
                <fieldset>
                    <div class="form-group">
                        <label class="control-label">Slug</label>
                        @if (current_route_matches('MenuController@createTranslation','MenuController@editTranslation' ))
                            <input type="text" class="form-control" name="slug"
                                   value="{{ implode('/', array_filter([$menu->basePath('slug'), $menu->slug]))}}"
                                   disabled/>
                        @else
                            <div class="input-group m-b">

                                @if (!empty($menu->basePath('name')))
                                    <span class="input-group-addon">{{$menu->basePath('slug')}}
                                        /</span>
                                @endif
                                <input type="text" class="form-control" name="slug"
                                       value="{{old('slug', $menu->slug ) }}"/>
                            </div>
                        @endif
                    </div>
                </fieldset>
            @endif

            @if (isset($pages))
                <fieldset>
                    <div class="form-group">
                        <label class="control-label">Page</label>
                        <select class="form-control menu"
                                name="page_id" {{ current_route_matches('MenuController@create', 'MenuController@edit') ? '' : 'disabled'}}>
                            <option value="">None</option>
                            @foreach ($pages as $page)

                                <option
                                    value="{{$page->id}}" {{@($menu->page_id === $page->id) ? 'selected':'' }}>{{$page->display_path  }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">Set mapping to page url.</span>
                    </div>
                </fieldset>
            @endif

            <fieldset>

                <div class="form-group">
                    <label class="control-label">External Url</label>
                    <div class="row">

                        <div class="col-sm-8 col-xs-8">
                            <input type="text" class="form-control"
                                   placeholder="Absolute Path or Absolute Url"
                                   name="external_url"
                                   value="{{old('external_url', @$menu->{"external_url:$locale"})}}">
                        </div>

                        <div class="col-sm-4 col-xs-4">
                            <select class="form-control" name="external_url_target">
                                <option value="_self">Target</option>
                                <option
                                    value="_blank" {{@$menu->{"external_url_target:$locale"} === "_blank" ? 'selected':''}}>
                                    _blank
                                </option>
                                <option
                                    value="_self" {{@$menu->{"external_url_target:$locale"} === "_self" ? 'selected':''}}>
                                    _self
                                </option>
                                <option
                                    value="_parent" {{@$menu->{"external_url_target:$locale"} === "_parent" ? 'selected':''}}>
                                    _parent
                                </option>
                                <option
                                    value="_top" {{@$menu->{"external_url_target:$locale"} === "_top" ? 'selected':''}}>
                                    _top
                                </option>
                            </select>
                        </div>

                    </div>
                    <span class="help-block">Set optional external link related to menu, if target is not selected, default is _self.</span>
                </div>
            </fieldset>

            <fieldset class="mb0 pb0">
                <div class="form-group">
                    <label class="control-label">Tag</label>
                    <select name="tags[]" class="form-control select2-tag"
                            multiple {{ current_route_matches('MenuController@create', 'MenuController@edit') ? '' : 'disabled'}}>
                        @foreach($allTags as $tag)
                            <option value="{{$tag}}" {{isset($menu) && $menu->tags->contains($tag) ? 'selected':''}}>{{$tag}}</option>
                        @endforeach
                    </select>
                </div>

            </fieldset>

        </div>

    </div>
</div>


@push('script')
    <script>
        $(function () {

            function formatLocale(locale) {
                //   if (!state.id) { return state.text; }
                var locale = $(
                    '<span><em class="flag-icon flag-icon-' + $(locale.element).data('flag') + '"/> ' + locale.text + '</span>'
                );
                return locale;
            };

            //locale
            $('.locale').select2({
                theme: 'bootstrap',
                width: '100%',
                templateResult: formatLocale,
                templateSelection: formatLocale
            });


            //menu
            $('.menu').select2({
                theme: 'bootstrap',
                width: '100%',
            });


            //select2 - tag
            $('.select2-tag').select2({
                theme: 'bootstrap',
                width: '100%',
                tags: true,
                tokenSeparators: [',', ' ']
            });

        });
    </script>


@endpush


