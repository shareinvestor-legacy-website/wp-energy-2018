<div class="panel panel-default">

    <div class="panel-body">

        <p class="lead">Sitemap</p>
        <fieldset>
            <textarea class="form-control codemirror-xml" rows="20" >
                {{$sitemap}}
            </textarea>


        </fieldset>


    </div>
    <div class="panel-footer">
        <div class="clearfix">

            <div class="pull-right">

                <button type="submit" class="btn btn-primary ">
                    <em class="fa fa-check fa-fw"></em>Ping to Google
                </button>
            </div>

        </div>
    </div>
</div>

<style type="text/css">
    .CodeMirror {
        border: 1px solid #eee;
        height: 450px;
    }
</style>
@push('script')
<script>
    $(function () {

        var xml = CodeMirror.fromTextArea($('.codemirror-xml')[0], {
            lineNumbers: true,
            mode: 'xml',
            autoRefresh: true,
            viewportMargin: Infinity
        });


    });
</script>
@endpush
