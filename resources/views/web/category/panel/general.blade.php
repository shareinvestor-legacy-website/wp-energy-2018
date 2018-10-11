<div class="col-sm-8">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">General</p>


            <fieldset>

                <div class="form-group  {{ error_has('name') ? 'has-error':'' }}">
                    <label class="control-label">Name</label>
                    <input type="text" class="form-control" name="name"
                           value="{{old('name', @$category->{"name:$locale"})  }}">
                    @include('component.error-message', ['field' => 'name'])
                </div>
            </fieldset>


            <fieldset>
                <div class="form-group">
                    <label class="control-label">Parent</label>
                    <select class="form-control category"
                            name="parent_id" {{ current_route_matches('CategoryController@create', 'CategoryController@edit') ? '' : 'disabled'}}>
                        <option value="">None</option>
                        @foreach ($selectableCategories as $selectableCategory)

                            <option value="{{$selectableCategory->id}}" {{@($category->parent_id === $selectableCategory->id) ? 'selected':'' }}>{{$selectableCategory->display_path }}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>





            <fieldset>
                <div class="form-group">
                    <label class="control-label">Body</label>
                    <textarea id="myTextarea" name="body" rows="10"
                              class="form-control tinymce">{{old('body',  @$category->{"body:$locale"}) }}</textarea>
                    <span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>
                </div>
            </fieldset>


            <fieldset class="mb0 pb0">
                <div class="form-group">
                    <label class="control-label">Excerpt</label>
                    <textarea name="excerpt" rows="5"
                              class="form-control">{{old('excerpt',  @$category->{"excerpt:$locale"} ) }}</textarea>
                    <span class="help-block">Excerpts are optional hand-crafted summaries of your content.</span>
                </div>

            </fieldset>

        </div>

    </div>
</div>


@push('script')
<script>
    $(function () {

        function formatLocale(locale) {
            //   if (!state.id) { return state.text; }
            var locale = $(
                    '<span><em class="flag-icon flag-icon-' + $(locale.element).data('flag') + '"/> ' + locale.text + '</span>'
            );
            return locale;
        };

        //locale
        $('.locale').select2({
            theme: 'bootstrap',
            width: '100%',
            templateResult: formatLocale,
            templateSelection: formatLocale
        });


        //category
        $('.category').select2({
            theme: 'bootstrap',
            width: '100%',
        });


    });
</script>


@endpush


