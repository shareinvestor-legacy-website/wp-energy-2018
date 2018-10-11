<div class="col-sm-4">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">Publish</p>

            @if (isset($menu))
                <fieldset class="{{current_route_matches('MenuController@createTranslation') ? 'hide':''}}">
                    <label class="control-label mr-lg">Translations</label>
                    <div class="btn-group">
                        @foreach(locales() as $code => $properties)
                            @if ($menu->hasTranslation($code))
                                @if (fallback_locale() == $code)
                                    <a href="{{action('Admin\MenuController@edit', ['id'=>$menu->id])}}"
                                       class="btn btn-default btn-xs btn-flag"
                                       title="{{$properties['name']}}">
                                        <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                                @else
                                    <a href="{{action('Admin\MenuController@editTranslation', ['id'=>$menu->id, 'locale' => $code])}}"
                                       class="btn btn-default btn-xs btn-flag"
                                       title="{{$properties['name']}}">
                                        <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                                @endif
                            @endif
                        @endforeach

                        @if ($menu->hasUntranslatedLocale())
                            <a type="button" class="btn btn-default btn-xs btn-flag"
                               href="{{action('Admin\MenuController@createTranslation',$menu->id)}}">
                                <span class="glyphicon glyphicon-plus"></span></a>
                        @endif
                    </div>
                    <span class="help-block">Jump to available translations or create new one.</span>
                </fieldset>
            @endif
            <fieldset>

                <div class="form-group">
                    <label class="control-label">Locale</label>
                    <select name="locale"
                            class="form-control locale" {{current_route_matches('MenuController@createTranslation') ? '':'disabled'}}>
                        @foreach($locales as $code => $data)
                            <option value="{{$code}}"
                                    data-flag="{{$data['flag']}}" {{ $locale === $code ? 'selected':''}}>{{$data['name']}}</option>
                        @endforeach
                    </select>
                    <span class="help-block">The current entity's locale.</span>
                </div>
            </fieldset>


            <fieldset class="pb0 mb0">
                <label class="control-label">Status</label>

                <div
                    class="radio {{ current_route_matches('MenuController@create', 'MenuController@edit') ? '' : 'disabled'}}">
                    <label class="radio-inline c-radio">
                        <input type="radio" name="status" value="private"
                               checked {{ current_route_matches('MenuController@create', 'MenuController@edit') ? '' : 'disabled'}}>
                        <span class="fa fa-circle"></span>Private</label>
                    <label class="radio-inline c-radio">
                        <input type="radio" name="status"
                               value="public" {{@($menu->status === 'public') ? 'checked':''}} {{ current_route_matches('MenuController@create', 'MenuController@edit') ? '' : 'disabled'}}>
                        <span class="fa fa-circle"></span>Public</label>

                </div>
            </fieldset>


            <div class="panel-footer">
                <div class="clearfix">
                    <div class="pull-left">
                        <button type="button"
                                class="btn btn-danger btn-delete {{current_route_matches('MenuController@editTranslation') ? '' : 'hide'}}">
                            <em class="fa fa-trash fa-fw"></em>Delete
                        </button>

                    </div>
                    <div class="pull-right">

                        <button type="submit" class="btn btn-primary ">
                            <em class="fa fa-check fa-fw"></em>Save
                        </button>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
