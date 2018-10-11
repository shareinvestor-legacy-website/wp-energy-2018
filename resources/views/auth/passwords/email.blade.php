@extends('auth.app')

<!-- Main Content -->
@section('content')


    <div class="row">
        <div class="col-xs-6 col-xs-offset-3 mt-xl">
            <!-- START panel-->
            <div class="panel panel-dark panel-flat">
                <div class="panel-heading text-center">
                    <a href="javascript:;" class="brand-logo">
                        <h3>Blaze CMS</h3>
                    </a>
                </div>
                <div class="panel-body">
                    <p class="text-center pv">RESET PASSWORD</p>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END panel-->
            <div class="p-lg text-center">
                <span>&copy;</span>
                <span>2016</span>
                <span>-</span>
                <span>Blaze CMS</span>
                {{--  <br>
                  <span>Bootstrap Admin Template</span>--}}
            </div>

        </div>
    </div>

