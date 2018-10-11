<div class="col-sm-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="lead">Publish</p>


            <fieldset>

                <div class="form-group">
                    <label class="control-label">Google Analytic</label>
                    <input type="text" class="form-control" name="analytic" value="{{setting('general.analytic.google')}}">
                    <span class="help-block">The id of Google Analytic</span>
                </div>
            </fieldset>
            <fieldset class="pb0 mb0">

                <div class="form-group">
                    <label class="control-label">Piwik</label>
                    <input type="text" class="form-control" name="piwik" value="{{setting('general.analytic.piwik')}}">
                    <span class="help-block">The id of Piwik Web Analytic</span>
                </div>
            </fieldset>
        </div>
        <div class="panel-footer">
            <div class="clearfix">
                <div class="pull-left">


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


    });
</script>
@endpush





