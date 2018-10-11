




@push('script')

<!-- Modal Large-->
<div id="audit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelLarge" aria-hidden="true"
     class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 id="myModalLabelLarge" class="modal-title">Changes</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <textarea id="audit-modal-value" rows="25" class="form-control codemirror-html"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-close">Close</button>
            </div>

        </div>
    </div>
</div>

<style>
    .CodeMirror {
        height: auto !important;
    }

</style>

<script>

    $(function () {


        var codemirror = CodeMirror.fromTextArea($('.codemirror-html')[0], {
            lineNumbers: true,
            mode: 'xml',
            autoRefresh: true
        });


        $('.btn-close').click(function () {

            codemirror.getDoc().setValue('');
            // Refresh CodeMirror
            setTimeout(
                    function()
                    {
                        $('.CodeMirror').each(function(i, el){
                            el.CodeMirror.refresh();
                        });
                    }, 800);

        });


        $('.btn-value').click(function () {


            codemirror.getDoc().setValue($(this).data('value'));
            // Refresh CodeMirror
            setTimeout(
                    function()
                    {
                        $('.CodeMirror').each(function(i, el){
                            el.CodeMirror.refresh();
                        });
                    }, 800);

        });




    });
</script>
@endpush