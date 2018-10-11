<fieldset>
    <legend class="text-default">Text</legend>

    <div class="form-group">
        <label class="col-sm-2 control-label">Parent</label>
        <div class="col-sm-10">

            <p class="form-control-static">Parent Category Name</p>
        </div>
    </div>
</fieldset>

<fieldset>
    <div class="form-group">
        <label class="col-sm-2 control-label">Language</label>
        <div class="col-sm-10">

            <select class="form-control">
                <option value="AL">Thai</option>
                <option value="AR">English</option>
            </select>
            <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>
    </div>

</fieldset>



<fieldset>
    <legend class="text-default">Property</legend>
    <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control">
            <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>
    </div>
</fieldset>
<fieldset>
    <div class="form-group has-error">
        <label class="col-sm-2 control-label">Parent</label>
        <div class="col-sm-10">

            <select class="form-control select2">
                <option value="AL">Alabama</option>
                <option value="AR">Arkansas</option>
                <option value="IL">Illinois</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>

            </select>
            <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>
    </div>
</fieldset>
<fieldset>
    <div class="form-group">
        <label class="col-sm-2 control-label mb">Date</label>
        <div class="col-sm-10">
            <div  class="input-group date col-md-3">
                <input type="text" class="form-control datepicker" placeholder="DD/MM/YYYY" >
                                 <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                 </span>
            </div>
            <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>
    </div>
</fieldset>
<fieldset>
    <div class="form-group">
        <label class="col-sm-2 control-label">Tags</label>
        <div class="col-sm-10">

            <select class="form-control select2-tag"  multiple>
                <option value="Alabama">Alabama</option>
                <option value="Arkansas">Arkansas</option>
                <option value="Illinois">Illinois</option>
                <option value="Iowa">Iowa</option>
                <option value="Kansas">Kansas</option>

            </select>
            <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>
    </div>
</fieldset>

@include('template.input-period-chooser')
@include('template.input-img-chooser')


<fieldset>
    <div class="form-group">
        <label class="col-sm-2 control-label">Visibility</label>
        <div class="col-sm-10">
            <label class="radio-inline c-radio">
                <input id="inlineradio1" type="radio" name="i-radio" value="option1" checked>
                <span class="fa fa-circle"></span>Public</label>
            <label class="radio-inline c-radio">
                <input id="inlineradio2" type="radio" name="i-radio" value="option2">
                <span class="fa fa-circle"></span>Private</label>
        </div>
    </div>
</fieldset>


@push('script')
<script>
    $(function () {


        //select2 - select
        $('.select2').select2({
            theme: 'bootstrap',
            width: '100%'
        });

        //select2 - tag
        $('.select2-tag').select2({
            theme: 'bootstrap',
            width: '100%',
            tags: true,
            tokenSeparators: [',', ' ']
        });

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


        $('.datepicker').datetimepicker({
            icons: icons,
            format: 'DD/MM/YYYY'
        });



    });
</script>
@endpush


