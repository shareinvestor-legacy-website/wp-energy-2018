<div class="panel panel-default">

    <div class="panel-body">

        <fieldset>

            <div class="form-group  {{ error_has('name') ? 'has-error':''}} ">
                <label class="control-label">Name</label>
                <input type="text" class="form-control"
                       {{ current_route_matches('TagController@create', 'TagController@edit') ? '' : 'disabled'}} name="name"
                       value="{{old('name',  @$tag->name)  }}">
                {!!error_message('name')  !!}
            </div>
        </fieldset>


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