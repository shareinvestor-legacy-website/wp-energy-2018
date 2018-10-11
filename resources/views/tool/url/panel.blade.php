<div class="panel panel-default">

    <div class="panel-body">

        <fieldset>

            <div class="form-group">
                <label class="control-label">Old URL</label>
                <input type="text" class="form-control" name="old_url" value="" placeholder="http://www.oldurl.com">
            </div>
            <span class="help-block">The old website url</span>
        </fieldset>
        <fieldset class="pb0 mb0">

            <div class="form-group">
                <label class="control-label">New URL</label>
                <input type="text" class="form-control" name="new_url" value="" placeholder="http://www.newurl.com">
            </div>
            <span class="help-block">The new website url</span>
        </fieldset>

    </div>
    <div class="panel-footer">
        <div class="clearfix">

            <div class="pull-right">

                <button type="button" class="btn btn-primary btn-update-url">
                    <em class="fa fa-check fa-fw"></em>Save
                </button>
            </div>

        </div>
    </div>
</div>



@push('script')
<script>
    $(function() {


        $('.btn-update-url').click(function (e) {


            e.preventDefault();

            swal({
                        title: "Are you sure?",
                        text: 'There is no going back, proceed as your own risk!',
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, of course!",
                        closeOnConfirm: false,
                        html: true
                    },
                    function (isConfirm) {

                        if (isConfirm) {
                            $('#update-url').submit();
                        }

                    });
        });
    });

</script>
@endpush