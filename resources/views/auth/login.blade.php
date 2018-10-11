@extends('auth.app')

@section('content')

    <div class="wrapper">
        <div class="block-center mt-xl wd-xl">
            <!-- START panel-->
            <div class="panel panel-dark panel-flat">
                <div class="panel-heading text-center">
                    <a href="javascript:;" class="brand-logo">
                        <h3>Blaze CMS</h3>
                    </a>
                </div>
                <div class="panel-body">
                    @include('component.flash')
                    <p class="text-center pv">PLEASE SIGN IN</p>
                    <form method="post" role="form" data-parsley-validate="" novalidate="" class="mb-lg"
                          action="{{action('Auth\LoginController@login')}}">
                        {{csrf_field()}}

                        <div class="form-group has-feedback {{ error_has('username') ? 'has-error':'' }}">
                            <input name="username" type="username" placeholder="Username" autocomplete="off" required
                                   class="form-control" value="{{old('username')}}">
                            <span class="fa fa-envelope form-control-feedback text-muted"></span>
                            @include('component.error-message', ['field' => 'username'])
                        </div>
                        <div class="form-group has-feedback {{ error_has('password') ? 'has-error':'' }}">
                            <input name="password" type="password" placeholder="Password" required class="form-control">
                            <span class="fa fa-lock form-control-feedback text-muted"></span>
                            @include('component.error-message', ['field' => 'password'])
                        </div>
                        <div class="clearfix">
                            <div class="checkbox c-checkbox pull-left mt0">
                                <label>
                                    <input type="checkbox" value="true" name="remember">
                                    <span class="fa fa-check"></span>Remember Me</label>
                            </div>
                            <div class="pull-right"><a href="{{url('admin/password/reset')}}" class="text-muted">Forgot
                                    your password?</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary mt-lg">Login</button>
                    </form>

                </div>
            </div>
            <!-- END panel-->
            <div class="p-lg text-center">
                <span>Blaze CMS v{{\BlazeCMS\Supports\Version::BLAZE}}</span>
                <br>
                <span>Copyright &copy;</span>
                <span>2016-2018</span>
                <span> | </span>
                <span>Shareinvestor Thailand</span>

            </div>
        </div>
    </div>
@endsection
