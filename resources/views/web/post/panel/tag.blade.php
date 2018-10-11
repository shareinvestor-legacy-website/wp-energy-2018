<div class="col-sm-12">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">Tag</p>

            <fieldset class="mb0 pb0">
                <div class="form-group">

                    <select name="tags[]" class="form-control select2-tag"
                            multiple {{ current_route_matches('PostController@create', 'PostController@edit') ? '' : 'disabled'}}>
                        @foreach($allTags as $tag)
                            <option value="{{$tag}}" {{isset($post) && $post->tags->contains($tag) ? 'selected':''}}>{{$tag}}</option>
                        @endforeach
                    </select>
                </div>

            </fieldset>


        </div>

    </div>
</div>

@push('script')
<script>
    $(function () {

        //select2 - tag
        $('.select2-tag').select2({
            theme: 'bootstrap',
            width: '100%',
            tags: true,
            tokenSeparators: [',', ' ']
        });

    });
</script>
@endpush
