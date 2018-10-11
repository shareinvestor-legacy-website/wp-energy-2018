<div class="form-inline">
    <div class="form-group m-sm">
        <select name="account" class="form-control m-b">
            <option>Option 1 Option 1 Option 1 Option 1 Option 1</option>
            <option>Option 2</option>
            <option>Option 3</option>
            <option>Option 4</option>
        </select>
    </div>
    <div class="form-group m-sm">
        <select name="account" class="form-control m-b">
            <option>Option 1</option>
            <option>Option 2</option>
            <option>Option 3</option>
            <option>Option 4</option>
        </select>
    </div>
    <div class="form-group m-sm">
        <div class="input-group date ">
            <input type="text" class="form-control period-from" placeholder="DD/MM/YYYY">
                                 <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                 </span>
        </div>
    </div>
    <div class="form-group m-sm">
        <div class="input-group date ">
            <input type="text" class="form-control period-to" placeholder="DD/MM/YYYY">
                                 <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                 </span>
        </div>
    </div>
    <div class="form-group m-sm">

        <input id="input-email" type="email" placeholder="Type your email" class="form-control">
    </div>
    <div class="form-group m-sm">
        <input id="input-password" type="password" placeholder="Type your password" class="form-control">
    </div>


    <button type="button" class="btn btn-default btn-expand m-sm">Filter</button>

</div>


@push('script')
<script>
    $(function () {

        $('select').select2({
            theme: 'bootstrap',
            width: '100%'
        });

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
            format: 'DD/MM/YYYY'
        });

        var periodTo = $('.period-to').datetimepicker({
            icons: icons,
            format: 'DD/MM/YYYY',
            useCurrent: false
        });

        periodFrom.on('dp.change',function(e) {
            periodTo.data("DateTimePicker").minDate(e.date);
        });

        periodTo.on('dp.change',function(e) {
            periodFrom.data("DateTimePicker").maxDate(e.date);
        });

    });
</script>
@endpush



