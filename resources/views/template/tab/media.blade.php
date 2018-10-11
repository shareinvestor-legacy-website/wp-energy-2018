<fieldset>
    <div class="form-group">

        <div class="col-sm-10">

            <button class="btn btn-default">Add Media</button>


            <span class="ml-lg">Please select file or image to attach into this post</span>
        </div>
    </div>
</fieldset>

<fieldset>

    <div class="row mb-lg">
        <div class="col-xs-3 col-md-2">
            <strong>Preview</strong>
        </div>
        <div class="col-xs-9 col-md-10">
            <strong>Details</strong>
        </div>
    </div>

    @for($i =1; $i <=3 ;$i++)

        <div class="row mb-lg pb-lg bb media-item">
            <div class="col-xs-3 col-md-2">
                <a href="#" title="Product 1">
                    <img src="/img/bg{{$i}}.jpg" alt="Product 1" class="img-responsive">
                </a>
            </div>
            <div class="col-xs-9 col-md-10">
                    <div class="form-group">
                        <input type="text" placeholder="Title" class="form-control mb input-sm">
                        <input type="text" placeholder="Caption" class="form-control mb input-sm">
                    </div>


                <div class="text-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-xs btn-default btn-up">
                            <em class="fa fa-arrow-circle-o-up fa-fw"></em>Move Up</button>
                        <button type="button" class="btn btn-xs btn-default btn-down">
                            <em class="fa fa-arrow-circle-o-down fa-fw"></em>Move Down</button>
                        <button type="button" class="btn btn-xs btn-danger">
                            <em class="fa fa-times-circle fa-fw"></em>Remove</button>
                    </div>
                </div>
            </div>
        </div>
    @endfor


</fieldset>


@push('script')
<script>
    $(function () {

        function reassignRowNumber($fieldset) {
            var $order = $fieldset.find('input[type=hidden][name$=Order]');
            var i = 1;
            $.each($order, function () {
                $(this).val(i);
                i = i + 1
            });
        }

        $(".btn-up").click(function () {
            var $parent = $(this).parents(".media-item");
            $parent.insertBefore($parent.prev());
         //   reassignRowNumber($(this).parents('fieldset'));
            return false;
        });
        $(".btn-down").click(function () {
            var $parent = $(this).parents(".media-item");
            $parent.insertAfter($parent.next());
        //    reassignRowNumber($(this).parents('fieldset'));
            return false;
        });


    });
</script>
@endpush
