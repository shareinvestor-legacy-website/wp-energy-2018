<fieldset>
    <div class="form-group">
        <label class="col-sm-2 control-label">Permanent Link</label>
        <div class="col-sm-10 form-inline">
            <p class="form-control-static">http://bladecms.dev/path/to/</p>
            <input type="text" class="form-control" placeholder="Slug">
        </div>
    </div>
</fieldset>

<fieldset>
    <div class="form-group">
        <label class="col-sm-2 control-label">Path</label>
        <div class="col-sm-10">

            <p class="form-control-static">/path/to/page</p>
        </div>
    </div>
</fieldset>

<fieldset>
    <div class="form-group">
        <label class="col-sm-2 control-label">External Link</label>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-9 mb">
                    <input type="text" class="form-control" placeholder="Absolute Path or Absolute Url">
                </div>
                <div class="col-sm-3">
                    <select class="form-control p-lg">
                        <option value="">Target</option>
                        <option value="_blank">_blank</option>
                        <option value="_self">_self</option>
                        <option value="_parent">_parent</option>
                        <option value="_top">_top</option>
                    </select>
                </div>
            </div>

            <span class="help-block">Set optional external link related to post, if target is not selected, default is _self.</span>
        </div>
    </div>
</fieldset>


@push('script')
<script>
    $(function () {


    });
</script>
@endpush


