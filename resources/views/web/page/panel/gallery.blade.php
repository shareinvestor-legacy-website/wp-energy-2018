<div class="col-sm-12">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">Gallery</p>

            <fieldset class="mb0 pb0">
                <div class="form-group">

                    <select class="form-control" id="gallery" multiple
                            name="gallery_ids[]" {{ current_route_matches('PageController@create', 'PageController@edit') ? '' : 'disabled'}}>
                        @foreach ($galleries as $gallery)
                            <option value="{{$gallery->id}}" {{in_array($gallery->id, old('gallery_ids', $gallery_ids)) ? 'selected' : ''}}>{{ $gallery->{'name:'.fallback_locale()} }}</option>
                        @endforeach
                    </select>

                </div>
                <span class="help-block">A page assigns multiple galleries.</span>
            </fieldset>


        </div>

    </div>
</div>



@push('script')
<script>
    $(function () {

        $('#gallery').select2({
            theme: 'bootstrap',
            width: '100%',
            'placeholder': 'Please select gallery'
        });

    });
</script>
@endpush
