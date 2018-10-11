<div class="col-sm-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="lead">Publish</p>

            @if (isset($position))
                <fieldset class="{{current_route_matches('PositionController@createTranslation') ? 'hide':''}}">
                    <label class="control-label mr-lg">Translations</label>
                    <div class="btn-group">
                        @foreach(locales() as $code => $properties)
                            @if ($position->hasTranslation($code))
                                @if (fallback_locale() == $code)
                                    <a href="{{action('Admin\PositionController@edit', ['id'=>$position->id])}}"
                                       class="btn btn-default btn-xs btn-flag"
                                       title="{{$properties['name']}}">
                                        <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                                @else
                                    <a href="{{action('Admin\PositionController@editTranslation', ['id'=>$position->id, 'locale' => $code])}}"
                                       class="btn btn-default btn-xs btn-flag"
                                       title="{{$properties['name']}}">
                                        <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                                @endif
                            @endif
                        @endforeach

                        @if ($position->hasUntranslatedLocale())
                            <a type="button" class="btn btn-default btn-xs btn-flag"
                               href="{{action('Admin\PositionController@createTranslation',$position->id)}}">
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
                            class="form-control locale" {{current_route_matches('PositionController@createTranslation') ? '':'disabled'}}>
                        @foreach($locales as $code => $data)
                            <option value="{{$code}}"
                                    data-flag="{{$data['flag']}}" {{ $locale === $code ? 'selected':''}}>{{$data['name']}}</option>
                        @endforeach
                    </select>
                    <span class="help-block">The current entity's locale.</span>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-group">
                    <label class="control-label mb">Date</label>
                    <div class="input-group date">
                        <input type="text" name="date" class="form-control datepicker"
                               placeholder="DD/MM/YYYY"
                               value="{{old('date', isset($position) && isset($position->date) ? $position->date->format('d/m/Y') : '')}}"
                                {{ current_route_matches('PositionController@create', 'PositionController@edit') ? '' : 'disabled'}}>
                        <span class="input-group-addon"><em class="fa fa-calendar"></em></span>
                    </div>
                </div>
            </fieldset>



            <fieldset>

                <div class="form-group ">
                    <label class="control-label">Availability</label>
                    <input type="text" class="form-control" name="availability" {{ current_route_matches('PositionController@create', 'PositionController@edit') ? '' : 'disabled'}}
                           value="{{old('availability', @$position->availability)  }}">
                </div>
                <span class="help-block">A number of available positions</span>
            </fieldset>

            <fieldset class="pb0 mb0">
                <label class="control-label mr-lg">Status</label>
                <div class="radio {{ current_route_matches('PositionController@create', 'PositionController@edit') ? '' : 'disabled'}}">
                    <label class="radio-inline c-radio">
                        <input type="radio" name="status" value="private"
                               checked {{ current_route_matches('PositionController@create', 'PositionController@edit') ? '' : 'disabled'}}>
                        <span class="fa fa-circle"></span>Private</label>
                    <label class="radio-inline c-radio">
                        <input type="radio" name="status"
                               value="public" {{@($position->status === 'public') ? 'checked':''}} {{ current_route_matches('PositionController@create', 'PositionController@edit') ? '' : 'disabled'}}>
                        <span class="fa fa-circle"></span>Public</label>
                </div>
            </fieldset>


        </div>
        <div class="panel-footer">
            <div class="clearfix">
                <div class="pull-left">
                    <button type="button"
                            class="btn btn-danger btn-delete {{current_route_matches('PositionController@editTranslation') ? '' : 'hide'}}">
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


        $('.datepicker').datetimepicker({
            icons: {
                time: 'fa fa-clock-o',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-crosshairs',
                clear: 'fa fa-trash'
            },
            format: 'DD/MM/YYYY'
        });


    });
</script>
@endpush





