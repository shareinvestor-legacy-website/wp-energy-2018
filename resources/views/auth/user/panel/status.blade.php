<div class="col-sm-4">
    <div class="panel panel-default">
        <div class="panel-body">
            <p class="lead">Role</p>


            <fieldset>
                <div class="form-group {{ error_has('role_names') ? 'has-error':'' }}">
                    <select class="form-control" id="role" multiple name="role_names[]" {{ current_route_matches('UserController@create', 'UserController@edit') ? '' : 'disabled'}}>
                        @foreach ($roles as $role)
                            <option value="{{$role->name}}" {{in_array($role->name, old('role_names', $role_names)) ? 'selected' : ''}}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @include('component.error-message', ['field' => 'role_names'])
                </div>
                <span class="help-block">Multiple roles can be assigned</span>

            </fieldset>


            <fieldset class="pb0 mb0">
                <label class="control-label mr-lg">Status</label>
                <div class="radio {{ current_route_matches('UserController@create', 'UserController@edit') ? '' : 'disabled'}}">
                    <label class="radio-inline c-radio">
                        <input type="radio" name="is_active" value="0" checked {{ current_route_matches('UserController@create', 'UserController@edit') ? '' : 'disabled'}}>
                        <span class="fa fa-circle"></span>Inactive</label>
                    <label class="radio-inline c-radio">
                        <input type="radio" name="is_active" value="1" {{@($user->is_active) ? 'checked':''}} {{ current_route_matches('UserController@create', 'UserController@edit') ? '' : 'disabled'}}>
                        <span class="fa fa-circle"></span>Active</label>
                </div>
            </fieldset>


        </div>
        <div class="panel-footer">
            <div class="clearfix">
                <div class="pull-left">


                </div>
                <div class="pull-right">

                    <button type="submit" class="btn btn-primary ">
                        <em class="fa fa-check fa-fw"></em>Save
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>


@push('script')
<script>
    $(function () {

        $('#role').select2({
            theme: 'bootstrap',
            width: '100%',
            'placeholder': 'Please select roles'
        });

    });
</script>
@endpush







