<div class="col-sm-12">
<div class="panel panel-default">

    <div class="panel-body">
        <p class="lead">Custom Style</p>

        <fieldset>

            <div class="form-group">
                <label class="control-label"> CSS</label>
                <textarea name="custom_css" rows="5"
                          class="form-control codemirror-css">{{old('custom_css',  @$page->{"custom_css:$locale"}) }}</textarea>
                <span class="help-block">The custom css embeded to the page.</span>

            </div>

        </fieldset>

        <fieldset class="mb0 pb0">
            <div class="form-group">
                <label class="control-label"> Javascript</label>
                <textarea name="custom_js" rows="5"
                          class="form-control codemirror-js">{{old('custom_js',  @$page->{"custom_js:$locale"}) }}</textarea>
                <span class="help-block">the custom javascript embeded to the page.</span>
            </div>
        </fieldset>

    </div>
</div>
</div>

@push('script')
<script>
    $(function () {

        var css = CodeMirror.fromTextArea($('.codemirror-css')[0], {
            lineNumbers: true,
            mode: 'css',
            autoRefresh: true

        });


        var js = CodeMirror.fromTextArea($('.codemirror-js')[0], {
            lineNumbers: true,
            mode: 'javascript',
            autoRefresh: true

        });

    });
</script>
@endpush
