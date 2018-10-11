<div class="panel panel-default">

    <div class="panel-body">
        <p class="lead">Roles</p>
        <fieldset>

            <div class="form-group  {{ error_has('name') ? 'has-error':''}} ">

                <input type="text" class="form-control" name="name"
                       value="{{old('name',  @$role->name)  }}">
                {!!error_message('name')  !!}
            </div>
        </fieldset>


        <p class="lead">Permissions</p>

        @foreach($auths as $module )
            <fieldset>

                <div class="form-group">
                    <label class="col-sm-2 control-label">{{$module['name']}}</label>
                    <div class="col-sm-10">

                        @foreach ($module['permissions'] as $permission => $desc)
                            <div class="checkbox c-checkbox">
                                <label class="needsclick">
                                    <input type="checkbox" name="{{$permission}}" value="{{$permission}}" {{isset($role) && $role->hasPermissionTo($permission) || old($permission, '') !== '' ? 'checked':''}}>
                                    <span class="fa fa-check"></span>{{$desc}}</label>
                            </div>
                        @endforeach

                    </div>
                </div>
            </fieldset>

        @endforeach




    </div>
    <div class="panel-footer">
        <div class="clearfix">

            <div class="pull-right">

                <button type="submit" class="btn btn-primary ">
                    <em class="fa fa-check fa-fw"></em>Save
                </button>
            </div>

        </div>
    </div>
</div>