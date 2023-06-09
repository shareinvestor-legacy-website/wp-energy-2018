@extends('auth.app')

@section('content')


    <div class="wrapper">
        <div class="block-center mt-xl wd-xl">
            <!-- START panel-->
            <div class="panel panel-dark panel-flat">
                <div class="panel-heading text-center">
                    <a href="#">
                        <img src="img/logo.png" alt="Image" class="block-center img-rounded">
                    </a>
                </div>
                <div class="panel-body">
                    <p class="text-center pv">SIGNUP TO GET INSTANT ACCESS.</p>
                    <form role="form" data-parsley-validate="" novalidate="" class="mb-lg">
                        <div class="form-group has-feedback">
                            <label for="signupInputEmail1" class="text-muted">Email address</label>
                            <input id="signupInputEmail1" type="email" placeholder="Enter email" autocomplete="off" required class="form-control">
                            <span class="fa fa-envelope form-control-feedback text-muted"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="signupInputPassword1" class="text-muted">Password</label>
                            <input id="signupInputPassword1" type="password" placeholder="Password" autocomplete="off" required class="form-control">
                            <span class="fa fa-lock form-control-feedback text-muted"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="signupInputRePassword1" class="text-muted">Retype Password</label>
                            <input id="signupInputRePassword1" type="password" placeholder="Retype Password" autocomplete="off" required data-parsley-equalto="#signupInputPassword1" class="form-control">
                            <span class="fa fa-lock form-control-feedback text-muted"></span>
                        </div>
                        <div class="clearfix">
                            <div class="checkbox c-checkbox pull-left mt0">
                                <label>
                                    <input type="checkbox" value="" required name="agreed">
                                    <span class="fa fa-check"></span>I agree with the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary mt-lg">Create account</button>
                    </form>
                    <p class="pt-lg text-center">Have an account?</p><a href="login.html" class="btn btn-block btn-default">Signup</a>
                </div>
            </div>
            <!-- END panel-->
            <div class="p-lg text-center">
                <span>&copy;</span>
                <span>2015</span>
                <span>-</span>
                <span>Angle</span>
                <br>
                <span>Bootstrap Admin Template</span>
            </div>
        </div>
    </div>

@endsection
