<div class="panel panel-default">

    <div class="panel-body">


        @if (isset($text))
            <fieldset class="{{current_route_matches('TextController@createTranslation') ? 'hide':''}}">
                <label class="control-label mr-lg">Translations</label>
                <div class="btn-group">
                    @foreach(locales() as $code => $properties)
                        @if ($text->hasTranslation($code))
                            @if (fallback_locale() == $code)
                                <a href="{{action('Admin\TextController@edit', ['id'=>$text->id])}}"
                                   class="btn btn-default btn-xs btn-flag"
                                   title="{{$properties['name']}}">
                                    <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                            @else
                                <a href="{{action('Admin\TextController@editTranslation', ['id'=>$text->id, 'locale' => $code])}}"
                                   class="btn btn-default btn-xs btn-flag"
                                   title="{{$properties['name']}}">
                                    <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                            @endif
                        @endif
                    @endforeach

                    @if ($text->hasUntranslatedLocale())
                        <a type="button" class="btn btn-default btn-xs btn-flag"
                           href="{{action('Admin\TextController@createTranslation',$text->id)}}">
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
                        class="form-control select2" {{current_route_matches('TextController@createTranslation') ? '':'disabled'}}>
                    @foreach($locales as $code => $data)
                        <option value="{{$code}}"
                                data-flag="{{$data['flag']}}" {{ $locale === $code ? 'selected':''}}>{{$data['name']}}</option>
                    @endforeach
                </select>
                <span class="help-block">The current entity's locale.</span>
            </div>
        </fieldset>


        <fieldset class="">

            <div class="form-group  {{ error_has('name') ? 'has-error':''}} ">
                <label class="control-label">Name</label>
                <input type="text" class="form-control"
                       {{ current_route_matches('TextController@create', 'TextController@edit') ? '' : 'disabled'}} name="name"
                       value="{{old('name',  @$text->name)  }}">
                {!!error_message('name')  !!}
            </div>
        </fieldset>
        <fieldset>

            <div class="form-group  {{ error_has('value') ? 'has-error':''}} ">
                <label class="control-label">Value</label>
                <input type="text" class="form-control" name="value"
                       value="{{old('value',@$text->{"value:$locale"}) }}">
                {!!error_message('value')  !!}
            </div>
        </fieldset>

    </div>
    <div class="panel-footer">
        <div class="clearfix">
            <div class="pull-left">
                <button type="button"
                        class="btn btn-danger btn-delete {{current_route_matches('TextController@editTranslation') ? '' : 'hide'}}">
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

        //select2 - select
        $('.select2').select2({
            theme: 'bootstrap',
            width: '100%',
            templateResult: formatLocale,
            templateSelection: formatLocale
        });

    });
</script>
@endpush
