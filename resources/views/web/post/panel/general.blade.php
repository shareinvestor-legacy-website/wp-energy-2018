<div class="col-sm-8">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">General</p>

            <fieldset>

                <div class="form-group  {{ error_has('title') ? 'has-error':'' }}">
                    <label class="control-label">Title</label>
                    <input type="text" class="form-control" name="title"
                           value="{{old('title', @$post->{"title:$locale"})  }}">
                    @include('component.error-message', ['field' => 'title'])
                </div>
            </fieldset>

            <fieldset>
                <div class="form-group  {{ error_has('alternate_title') ? 'has-error':''}}">
                    <label class="control-label">Alternate Title</label>
                    <input type="text" class="form-control" name="alternate_title"
                           value="{{old('alternate_title', @$post->{"alternate_title:$locale"})  }}">
                    @include('component.error-message', ['field' => 'alternate_title'])
                    <span class="help-block">Set alternate text as the alias of title. Useful if post title requires different value.</span>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-group {{ error_has('category_ids') ? 'has-error':'' }}">
                    <label class="control-label">Category</label>
                    <select class="form-control" id="category" multiple
                            name="category_ids[]" {{ current_route_matches('PostController@create', 'PostController@edit') ? '' : 'disabled'}}>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{in_array($category->id, old('category_ids', $category_ids)) ? 'selected' : ''}}>{{ $category->display_path }}</option>
                        @endforeach
                    </select>
                    @include('component.error-message', ['field' => 'category_ids'])
                </div>
                <span class="help-block">A post can be attached to multiple categories.</span>

            </fieldset>


            <fieldset>
                <div class="form-group">
                    <label class="ccontrol-label">Body</label>
                    <textarea id="myTextarea" name="body" rows="10"
                              class="form-control tinymce">{{old('body',  @$post->{"body:$locale"}) }}</textarea>
                </div>
            </fieldset>


            <fieldset class="mb0 pb0">
                <div class="form-group">
                    <label class="control-label">Excerpt</label>
                    <textarea name="excerpt" rows="15"
                              class="form-control">{{old('excerpt',  @$post->{"excerpt:$locale"} ) }}</textarea>
                    <span class="help-block">Excerpts are optional hand-crafted summaries of your content.</span>
                </div>

            </fieldset>


        </div>

    </div>
</div>

@push('script')
<script>
    $(function () {

        $('#category').select2({
            theme: 'bootstrap',
            width: '100%',
            'placeholder': 'Please select category'
        });

    });
</script>
@endpush
