<div class="col-sm-8">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">General</p>

            <fieldset>

                <div class="form-group  {{ error_has('title') ? 'has-error':'' }}">
                    <label class="control-label">Title</label>
                    <input type="text" class="form-control" name="title"
                           value="{{old('title', @$page->{"title:$locale"})  }}">
                    @include('component.error-message', ['field' => 'title'])
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group  {{ error_has('alternate_title') ? 'has-error':''}}">
                    <label class="control-label">Alternate Title</label>
                    <input type="text" class="form-control" name="alternate_title"
                           value="{{old('alternate_title', @$page->{"alternate_title:$locale"})  }}">
                    @include('component.error-message', ['field' => 'alternate_title'])
                    <span class="help-block">Set alternate text as the alias of title. Useful if page title requires different value.</span>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="control-label">Parent</label>
                    <select class="form-control page"
                            name="parent_id" {{ current_route_matches('PageController@create', 'PageController@edit') ? '' : 'disabled'}}>
                        <option value="">None</option>
                        @foreach ($selectablePages as $selectablePage)

                            <option value="{{$selectablePage->id}}" {{@($page->parent_id === $selectablePage->id) ? 'selected':'' }}>{{ $selectablePage->display_path  }}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>


            <fieldset>
                <div class="form-group">
                    <label class="ccontrol-label">Body</label>
                    <textarea id="myTextarea" name="body" rows="10"
                              class="form-control tinymce">{{old('body',  @$page->{"body:$locale"}) }}</textarea>
                </div>
            </fieldset>


            <fieldset class="mb0 pb0">
                <div class="form-group">
                    <label class="control-label">Excerpt</label>
                    <textarea name="excerpt" rows="10"
                              class="form-control">{{old('excerpt',  @$page->{"excerpt:$locale"} ) }}</textarea>
                    <span class="help-block">Excerpts are optional hand-crafted summaries of your content.</span>
                </div>

            </fieldset>


        </div>

    </div>
</div>

@push('script')
<script>
    $(function () {


        //page
        $('.page').select2({
            theme: 'bootstrap',
            width: '100%',
        });


    });
</script>
@endpush
