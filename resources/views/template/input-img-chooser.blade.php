
<fieldset>

    <div class="form-group">
        <label class="col-sm-2 control-label">Image</label>
        <div class="col-sm-10">

            <div class="panel col-sm-8 col-md-6  img-chooser">

                <div class="row">
                    <input type="hidden" name="image" />
                    <a href="javascript:;">
                        <img src="/img/bg1.jpg" class="img-responsive img-thumbnail img-chooser-thumbnail">
                    </a>
                </div>

                <div class="row">
                    <button class="btn btn-default col-sm-6 col-xs-6 img-chooser-select">Choose File</button>
                    <button class="btn btn-default col-sm-6 col-xs-6 img-chooser-remove">Remove</button>
                </div>

            </div>
        </div>
    </div>
</fieldset>


@push('script')
<script>
    $(function () {
        //image chooser
        $('.img-chooser-select').click(function () {
            var url = "/elfinder/featuredimage";
            window.open(url, '_blank', 'scrollbars=1,width=900,height=600');
            return false;
        });
        $('.img-chooser-remove').click(function () {

            $img = $(".img-chooser-thumbnail");
            $img.removeAttr('src');
            $(".img-chooser input[type=hidden]").val("");
            return false;
        });
    });
</script>
@endpush
