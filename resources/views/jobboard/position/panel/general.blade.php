<div class="col-sm-8">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">General</p>

            <fieldset>

                <div class="form-group  {{ error_has('title') ? 'has-error':'' }}">
                    <label class="control-label">Title</label>
                    <input type="text" class="form-control" name="title"
                           value="{{old('title', @$position->{"title:$locale"})  }}">
                    @include('component.error-message', ['field' => 'title'])
                </div>
            </fieldset>

            <fieldset>
                <div class="form-group">
                    <label class="control-label">Department</label>
                    <select class="form-control"
                            name="department_id" {{ current_route_matches('PositionController@create', 'PositionController@edit') ? '' : 'disabled'}}>
                        <option value="">None</option>
                        @foreach ($departments as $department)
                            <option value="{{$department->id}}" {{@($position->department_id == $department->id) ? 'selected':'' }}>{{$department->{'name:'.fallback_locale()} }}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>


            <fieldset>
                <div class="form-group">
                    <label class="control-label">Location</label>
                    <select class="form-control"
                            name="location_id" {{ current_route_matches('PositionController@create', 'PositionController@edit') ? '' : 'disabled'}}>
                        <option value="">None</option>
                        @foreach ($locations as $location)
                            <option value="{{$location->id}}" {{@($position->location_id == $location->id) ? 'selected':'' }}>{{$location->{'name:'.fallback_locale()} }}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-group">
                    <label class="ccontrol-label">Qualification</label>
                    <textarea id="myTextarea" name="qualification" rows="10"
                              class="form-control tinymce">{{old('qualification',  @$position->{"qualification:$locale"}) }}</textarea>
                </div>
            </fieldset>

            <fieldset>
                <div class="form-group">
                    <label class="ccontrol-label">Description</label>
                    <textarea id="myTextarea" name="description" rows="10"
                              class="form-control tinymce">{{old('description',  @$position->{"description:$locale"}) }}</textarea>
                </div>
            </fieldset>




        </div>

    </div>
</div>

@push('script')
<script>
    $(function () {


    });
</script>
@endpush
