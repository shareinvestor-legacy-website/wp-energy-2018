<div class="col-sm-4">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">Post Period</p>

            <fieldset>
                <div class="form-group {{ error_has('period_from') ? 'has-error':'' }}">
                    <label class="control-label mb">From</label>
                    <div class="input-group date">
                        <input type="text" name="period_from" class="form-control period-from"
                               placeholder="DD/MM/YYYY HH:MM"
                               value="{{old('period_from', isset($post) && isset($post->period_from) ? $post->period_from->format('d/m/Y H:i') : '')}}"
                                {{ current_route_matches('PostController@create', 'PostController@edit') ? '' : 'disabled'}}>
                        <span class="input-group-addon"><em class="fa fa-calendar"></em></span>
                    </div>
                    @include('component.error-message', ['field' => 'period_from'])
                </div>
            </fieldset>
            <fieldset class="mb0 pb0">
                <div class="form-group {{ error_has('period_to') ? 'has-error':'' }}">
                    <label class="control-label mb">To</label>
                    <div class="input-group date">
                        <input type="text" name="period_to" class="form-control period-to"
                               placeholder="DD/MM/YYYY HH:MM"
                               value="{{old('period_to', isset($post) && isset($post->period_to) ? $post->period_to->format('d/m/Y H:i') : '')}}"
                                {{ current_route_matches('PostController@create', 'PostController@edit') ? '' : 'disabled'}}>
                        <span class="input-group-addon"><em class="fa fa-calendar"></em></span>
                    </div>
                    @include('component.error-message', ['field' => 'period_to'])
                </div>

            </fieldset>



        </div>
        <div class="panel-footer">
            <div class="clearfix">
                <div class="pull-left">
                    <span class="help-block">Time is in 24 hours format.</span>

                </div>
                <div class="pull-right">

                    <button class="btn btn-default period-reset mb" {{ current_route_matches('PostController@create', 'PostController@edit') ? '' : 'disabled'}}>Clear</button>
                </div>

            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(function () {

        //period
        var icons = {
            time: 'fa fa-clock-o',
            date: 'fa fa-calendar',
            up: 'fa fa-chevron-up',
            down: 'fa fa-chevron-down',
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-crosshairs',
            clear: 'fa fa-trash'
        };


        var periodFrom = $('.period-from').datetimepicker({
            icons: icons,
            sideBySide: true,
            format: 'DD/MM/YYYY HH:mm'
        });

        var periodTo = $('.period-to').datetimepicker({
            icons: icons,
            sideBySide: true,
            format: 'DD/MM/YYYY HH:mm',
            useCurrent: false
        });

        periodFrom.on('dp.change',function(e) {
            periodTo.data("DateTimePicker").minDate(e.date);
        });

        periodTo.on('dp.change',function(e) {
            periodFrom.data("DateTimePicker").maxDate(e.date);
        });

        $('.period-reset').click(function() {
            periodFrom.data("DateTimePicker").clear();
            periodTo.data("DateTimePicker").clear();
            return false;
        });


    });
</script>
@endpush
