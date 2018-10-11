<div class="col-sm-12">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">File</p>

            <fieldset class="mb0 pb0">
                <div class="form-group">

                    <div class="input-group">
                        <input id="file" type="text" class="form-control" name="file"
                               value="{{old('file',  @$page->{"file:$locale"}) }}">
                        <span class="input-group-btn">
                                                <button type="button" class="btn btn-default elfinder-choose"
                                                        data-inputid="file">Choose</button>
                                            </span>
                    </div>
                    <span class="help-block">Select file related to this page</span>
                </div>
            </fieldset>


        </div>

    </div>
</div>

@push('script')
<script>
    $(function () {

    });
</script>
@endpush
