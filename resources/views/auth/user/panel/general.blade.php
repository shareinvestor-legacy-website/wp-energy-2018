<div class="col-sm-8">
    <div class="panel panel-default">

        <div class="panel-body">
            <p class="lead">General</p>

            <fieldset>

                <div class="form-group  {{ error_has('username') ? 'has-error':''}} ">
                    <label class="control-label">Username</label>
                    <input type="text" class="form-control"
                           {{ current_route_matches('UserController@create', 'UserController@edit') ? '' : 'disabled'}} name="username"
                           value="{{old('username',  @$user->username)  }}">
                    {!!error_message('username')  !!}
                </div>
            </fieldset>

            <fieldset>

                <div class="form-group  {{ error_has('email') ? 'has-error':''}} ">
                    <label class="control-label">Email</label>
                    <input type="text" class="form-control"
                           {{ current_route_matches('UserController@create', 'UserController@edit', 'UserController@profile') ? '' : 'disabled'}} name="email"
                           value="{{old('email',  @$user->email)  }}">
                    {!!error_message('email')  !!}
                </div>
            </fieldset>

            <fieldset class="{{ current_route_matches('UserController@create') ? 'hide':''}}">
                <div class="form-group">
                    <div class="col-sm-4">
                        <label class="checkbox-inline c-checkbox">
                            <input id="changePass" type="checkbox" value="" {{error_has('password') ? 'checked': ''}}>
                            <span class="fa fa-check"></span>Change Password</label>
                    </div>
                </div>
            </fieldset>


            <fieldset class="password {{ current_route_matches('UserController@edit', 'UserController@profile') && !error_has('password') ? 'hide' : ''}}">
                <div class="form-group  {{ error_has('password') ? 'has-error':''}} ">
                    <label class="control-label">Password</label>
                    <input type="password" class="form-control"
                           {{ current_route_matches('UserController@create', 'UserController@edit','UserController@profile') ? '' : 'disabled'}} name="password">
                    {!!error_message('password')  !!}
                </div>
            </fieldset>
            <fieldset class="password {{ current_route_matches('UserController@edit', 'UserController@profile') && !error_has('password')  ? 'hide' : ''}}">
                <div class="form-group  {{ error_has('password') ? 'has-error':''}} ">
                    <label class="control-label">Confirm Password</label>
                    <input type="password" class="form-control"
                           {{ current_route_matches('UserController@create', 'UserController@edit','UserController@profile') ? '' : 'disabled'}} name="password_confirmation">
                    {!!error_message('password')  !!}
                </div>
            </fieldset>


        </div>

    </div>
</div>

@push('script')

<script>
    $(function() {
        $('#changePass').click(function() {
            if ($(this).is(':checked')) {
                $('fieldset.password').removeClass('hide').slideDown();
            } else {
                $('fieldset.password').slideUp();
            }

        });
    });
</script>
@endpush
