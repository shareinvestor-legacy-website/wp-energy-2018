<div class="panel panel-default">

    <div class="panel-body">

        <fieldset>

            <div class="form-group">
                <label class="control-label">Locale</label>

                <select name="locale"
                        class="form-control select2" {{current_route_matches('PositionController@createTranslation') ? '':'disabled'}}>
                    @foreach($locales as $code => $data)
                        <option value="{{$code}}"
                                data-flag="{{$data['flag']}}" {{ $locale === $code ? 'selected':''}}>{{$data['name']}}</option>
                    @endforeach
                </select>
            </div>
        </fieldset>


        <fieldset class="">

            <div class="form-group  {{ error_has('title') ? 'has-error':''}} ">
                <label class="control-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{old('title',  @$location->{"title:$locale"})  }}">
                {!!error_message('title')  !!}
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
