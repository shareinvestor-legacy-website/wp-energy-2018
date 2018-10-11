<div class="col-sm-12">

    <div id="gallery" class="panel panel-default">

        <div class="panel-body">

            <p class="lead">Images</p>

            <fieldset
                    class="{{ current_route_matches('GalleryController@create', 'GalleryController@edit') ? '' : 'hide'}}">
                <div class="form-group ">

                    <input id="image" type="hidden">
                    <button class="btn btn-default btn-add elfinder-choose" data-inputid="image">Add Image</button>

                    <span class="ml-lg">Please select file or image to attach into this post</span>
                </div>

            </fieldset>
        </div>
        <div class="panel-body">


            <div id="images" class="row {{ current_route_matches('GalleryController@create', 'GalleryController@edit') ? 'sortable' : ''}}">



                @foreach(old('images', $images) as $index => $image)



                    <div class="col-sm-3 portlet-sortable-item  {{$image['status'] === 'deleted' ? 'hide':''}}">
                        <div class="panel panel-default">
                            <img src="/{{$image['path'] or  $image->path}}" class="img-fixed-height-125 portlet-handler">
                            <div class="panel-body">
                                <div class="form-group">

                                    <input type="text" name="images[{{$index}}][caption]" placeholder="Caption"
                                           class="form-control mb input-sm img-caption"
                                           value="{{$image->{"caption:$locale"} or $image['caption'] }}">
                                    <input type="hidden" name="images[{{$index}}][id]" class="img-id"
                                           value="{{$image['id'] or $image->id}}">
                                    <input type="hidden" name="images[{{$index}}][status]" class="img-status"
                                           value="{{$image['status'] or 'updated'}}">
                                    <input type="hidden" name="images[{{$index}}][order]" class="img-order"
                                           value="{{$image['order'] or $image->order}}">
                                    <input type="hidden" name="images[{{$index}}][path]" class="img-path"
                                           value="{{$image['path'] or $image->path}}">
                                </div>
                            </div>
                            <div class="panel-footer {{ current_route_matches('GalleryController@create', 'GalleryController@edit') ? '' : 'hide'}}">
                                <div class="clearfix">
                                    <div class="pull-right">
                                        <button type="button"
                                                class="btn btn-danger btn-delete btn-xs">
                                            <em class="fa fa-trash fa-fw"></em>Delete
                                        </button>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
            <span class=" help-block {{ current_route_matches('GalleryController@create', 'GalleryController@edit') ? '' : 'hide'}}">Drag & Drop any images to rearrange order.</span>

        </div>

    </div>

    <div id="clone" class="col-sm-3 portlet-sortable-item hide">
        <div class="panel panel-default">
            <img src="" class="img-fixed-height-125 portlet-handler">
            <div class="panel-body">
                <div class="form-group">
                    <input type="text" placeholder="Caption" class="form-control mb input-sm img-caption" value="">
                    <input type="hidden" class="img-status" value="created">
                    <input type="hidden" class="img-order" value="">
                    <input type="hidden" class="img-path" value="">
                    <input type="hidden" class="img-id" value="">
                </div>
            </div>
            <div class="panel-footer">
                <div class="clearfix">
                    <div class="pull-right">
                        <button type="button"
                                class="btn btn-danger btn-delete btn-xs">
                            <em class="fa fa-trash fa-fw"></em>Delete
                        </button>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


@push('script')
<script>
    $(function () {

        function reorder() {
            var $order = $('#images').find('.img-order');
            var i = 1;
            $.each($order, function () {
                $(this).val(i);
                i = i + 1
            });
        }

        function createNode(path) {
            var $clone = $('#clone').clone(true);
            $clone.removeClass('hide');
            $clone.removeAttr('id');
            $clone.find('img').attr('src', path);
            $clone.find('.img-path').val(path.substring(1));
            return $clone;
        }

        function fillName($element) {
            var order = $element.find('.img-order').val();
            $element.find('.img-id').attr('name', 'images[' + order + '][id]');
            $element.find('.img-path').attr('name', 'images[' + order + '][path]');
            $element.find('.img-order').attr('name', 'images[' + order + '][order]');
            $element.find('.img-status').attr('name', 'images[' + order + '][status]');
            $element.find('.img-caption').attr('name', 'images[' + order + '][caption]');

        }

        $('#images.sortable').sortable({
            items: '> div',
            handle: '.portlet-handler',
            opacity: 0.7,
            forcePlaceholderSize: true,
            tolerance: 'pointer',
            helper: 'original',
            revert: 200,
            forceHelperSize: true,
            start: function (e, ui) {
                ui.placeholder.height(ui.item.height());
            },
            stop: function (e, ui) {
                reorder();
            }
        });


        $("#gallery").on('click', '.btn-delete', function () {
            var $image = $(this).parents(".portlet-sortable-item");
            $image.find('.img-status').val('deleted');
            $image.addClass('hide');
            return false;
        });


        //if there is new image chosen by elfinder, create new node and assign to gallery
        $('#image').change(function () {
            var $image = $(this);
            try {
                var paths = $image.val().split(",").map(function (value) {
                    return '/' + value;
                });

                if (paths) {

                    for (i = 0; i < paths.length; i++) {
                        var $clone = createNode(paths[i]);
                        $clone.appendTo($('#images'));

                        //reorder to get array index
                        reorder();

                        //fill name using order as array index
                        fillName($clone);
                    }
                }
            } catch (e) {
            }
            $image.val('');

        });

    });
</script>
@endpush
