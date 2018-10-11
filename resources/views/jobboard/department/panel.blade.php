<div class="panel panel-default">

    <div class="panel-body">

        @if (isset($department))
            <fieldset class="{{current_route_matches('DepartmentController@createTranslation') ? 'hide':''}}">
                <label class="control-label mr-lg">Translations</label>
                <div class="btn-group">
                    @foreach(locales() as $code => $properties)
                        @if ($department->hasTranslation($code))
                            @if (fallback_locale() == $code)
                                <a href="{{action('Admin\DepartmentController@edit', ['id'=>$department->id])}}"
                                   class="btn btn-default btn-xs btn-flag"
                                   title="{{$properties['name']}}">
                                    <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                            @else
                                <a href="{{action('Admin\DepartmentController@editTranslation', ['id'=>$department->id, 'locale' => $code])}}"
                                   class="btn btn-default btn-xs btn-flag"
                                   title="{{$properties['name']}}">
                                    <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                            @endif
                        @endif
                    @endforeach

                    @if ($department->hasUntranslatedLocale())
                        <a type="button" class="btn btn-default btn-xs btn-flag"
                           href="{{action('Admin\DepartmentController@createTranslation',$department->id)}}">
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
                        class="form-control select2" {{current_route_matches('DepartmentController@createTranslation') ? '':'disabled'}}>
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
                <input type="text" class="form-control" name="name" value="{{old('name',  @$department->{"name:$locale"})  }}">
                {!!error_message('name')  !!}
            </div>
        </fieldset>


        <fieldset>
            <div class="form-group">
                <label class="ccontrol-label">Remark</label>
                <textarea id="myTextarea" name="remark" rows="5"
                          class="form-control ">{{old('remark',  @$department->{"remark:$locale"}) }}</textarea>
            </div>
        </fieldset>

    </div>
    <div class="panel-footer">
        <div class="clearfix">
            <div class="pull-left">
                <button type="button"
                        class="btn btn-danger btn-delete {{current_route_matches('DepartmentController@editTranslation') ? '' : 'hide'}}">
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
