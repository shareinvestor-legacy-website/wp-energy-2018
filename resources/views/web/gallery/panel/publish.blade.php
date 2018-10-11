<div class="col-sm-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="lead">Publish</p>

            @if (isset($gallery))
                <fieldset class="{{current_route_matches('GalleryController@createTranslation') ? 'hide':''}}">
                    <label class="control-label mr-lg">Translations</label>
                    <div class="btn-group">
                        @foreach(locales() as $code => $properties)
                            @if ($gallery->hasTranslation($code))
                                @if (fallback_locale() == $code)
                                    <a href="{{action('Admin\GalleryController@edit', ['id'=>$gallery->id])}}"
                                       class="btn btn-default btn-xs btn-flag"
                                       title="{{$properties['name']}}">
                                        <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                                @else
                                    <a href="{{action('Admin\GalleryController@editTranslation', ['id'=>$gallery->id, 'locale' => $code])}}"
                                       class="btn btn-default btn-xs btn-flag"
                                       title="{{$properties['name']}}">
                                        <span class="flag-icon flag-icon-{{$properties['flag']}}"></span></a>
                                @endif
                            @endif
                        @endforeach

                        @if ($gallery->hasUntranslatedLocale())
                            <a type="button" class="btn btn-default btn-xs btn-flag"
                               href="{{action('Admin\GalleryController@createTranslation',$gallery->id)}}">
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
                            class="form-control locale" {{current_route_matches('GalleryController@createTranslation') ? '':'disabled'}}>
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
                               value="{{old('date', isset($gallery) && isset($gallery->date) ? $gallery->date->format('d/m/Y') : '')}}"
                                {{ current_route_matches('GalleryController@create', 'GalleryController@edit') ? '' : 'disabled'}}>
                        <span class="input-group-addon"><em class="fa fa-calendar"></em></span>
                    </div>
                </div>
            </fieldset>



            <fieldset class="pb0 mb0">
                <label class="control-label mr-lg">Status</label>
                <div class="radio {{ current_route_matches('GalleryController@create', 'GalleryController@edit') ? '' : 'disabled'}}">
                    <label class="radio-inline c-radio">
                        <input type="radio" name="status" value="private"
                               checked {{ current_route_matches('GalleryController@create', 'GalleryController@edit') ? '' : 'disabled'}}>
                        <span class="fa fa-circle"></span>Private</label>
                    <label class="radio-inline c-radio">
                        <input type="radio" name="status"
                               value="public" {{@($gallery->status === 'public') ? 'checked':''}} {{ current_route_matches('GalleryController@create', 'GalleryController@edit') ? '' : 'disabled'}}>
                        <span class="fa fa-circle"></span>Public</label>
                </div>
            </fieldset>


        </div>
        <div class="panel-footer">
            <div class="clearfix">
                <div class="pull-left">
                    <button type="button"
                            class="btn btn-danger btn-delete {{current_route_matches('GalleryController@editTranslation') ? '' : 'hide'}}">
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





