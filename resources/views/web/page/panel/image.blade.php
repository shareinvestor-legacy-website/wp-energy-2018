<div class="col-sm-4">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">Image</p>
            <div class="row">
                <div class="col-sm-12">
                    <input id="image" type="hidden" name="image"
                           value="{{old('image', @$page->{"image:$locale"})  }}"/>
                    <a href="javascript:;">
                        <img class="img-responsive img-thumbnail mb-lg">
                    </a>
                </div>
                <div class="col-sm-12">
                    <button class="btn btn-default col-sm-6 col-xs-6 elfinder-choose"
                            data-inputid="image">Choose File
                    </button>
                    <button class="btn btn-default col-sm-6 col-xs-6 elfinder-remove">
                        Remove
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
<script>
    $(function () {

        //image
        $('#image').change(function () {
            var $image = $(this);
            var $thumbnail = $image.next().children();
            var val = $image.val();

            if (val) {
                var url = val ? '//' + window.location.hostname + '/' + val : '';
                var image = new Image();

                image.onload = function () {
                    $thumbnail.attr('src', url);
                    $('.elfinder-remove, .img-responsive').removeClass('hide');
                }

                image.onerror = function (e) {
                    swal({
                        type: 'error',
                        title: 'Error',
                        text: "This is not valid image file"
                    });
                    $image.val('');

                }
                image.src = url;
            } else {

                $thumbnail.attr('src', '');
                $('.elfinder-remove, .img-responsive').addClass('hide');
            }

        });

        $('.elfinder-remove').click(function (e) {
            e.preventDefault();
            $('#image').val('').trigger('change');
        });

        $('#image').trigger('change');


    });
</script>
@endpush
