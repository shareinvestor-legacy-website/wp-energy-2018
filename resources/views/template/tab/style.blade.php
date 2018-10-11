<fieldset>
    <div id="tab2" role="tabpanel" class="tab-pane">
        <div class="form-group">
            <label class="col-sm-2 control-label">CSS</label>
            <div class="col-sm-10">

                <textarea rows="5" class="form-control codemirror-css"></textarea>
                <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
            </div>
        </div>
    </div>
</fieldset>

<fieldset>
    <div class="form-group">
        <label class="col-sm-2 control-label">Javascript</label>
        <div class="col-sm-10">
                <textarea rows="5" class="form-control codemirror-js"></textarea>
            <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
        </div>
    </div>

</fieldset>

@push('script')
<script>
    $(function () {

        var css = CodeMirror.fromTextArea($('.codemirror-css')[0], {
            lineNumbers: true,
            mode: 'css',
            autoRefresh : true

        });


        var js = CodeMirror.fromTextArea($('.codemirror-js')[0], {
            lineNumbers: true,
            mode: 'javascript',
            autoRefresh : true

        });

    });
</script>
@endpush
