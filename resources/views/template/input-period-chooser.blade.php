<fieldset>
    <div class="form-group">
        <label class="col-sm-2 control-label">Period</label>
        <div class="col-sm-10 form-inline">
            <div  class="input-group date  col-md-4 mb">
                <input type="text" class="form-control period-from" placeholder="DD/MM/YYYY HH:MM">
                                 <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                 </span>
            </div>
            <div  class="input-group date  col-md-4 mb">
                <input type="text" class="form-control period-to" placeholder="DD/MM/YYYY HH:MM">
                                 <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                 </span>
            </div>
            <button class="btn btn-default period-reset mb">Clear</button>
            <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>
    </div>
</fieldset>



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
            format: 'DD/MM/YYYY HH:MM'
        });

        var periodTo = $('.period-to').datetimepicker({
            icons: icons,
            format: 'DD/MM/YYYY HH:MM',
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
