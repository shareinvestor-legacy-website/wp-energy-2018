@extends('layouts.app')


@section('content')

    <div class="content-heading">

        User


        @include('component.breadcrumb', ['items' => ['Auth', 'User', 'All Users']])
    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-lg-12">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">

                            <form method="get" action="{{action('Admin\UserController@index')}}" class="form-inline">

                                <div class="form-group m-sm">

                                    <input type="text" name="username" placeholder="Username" class="form-control"
                                           value="{{ $username  }}">
                                </div>
                                <div class="form-group m-sm">

                                    <input type="text" name="email" placeholder="Email" class="form-control"
                                           value="{{ $email  }}">
                                </div>

                                <button type="submit" class="btn btn-default btn-expand m-sm">Filter</button>

                            </form>
                        </div>

                    </div>
                </div>
                <div class="panel-body">
                    <!-- START table-responsive-->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover tree">
                            <thead>
                            <tr>
                                <th><strong>Username</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>Role</strong></th>
                                <th><strong>Status</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr class="">
                                    <td class="col-md-2 col-xs-2">{{$user->username}}</td>
                                    <td class="col-md-4 col-xs-3">{{$user->email}}</td>
                                    <td class="col-md-3 col-xs-3">

                                        @foreach($user->roles->sortBy('name') as $role)
                                            <span class="label bg-primary-light">{{$role->name }}</span>
                                        @endforeach

                                    </td>

                                    <td class="col-md-2 col-xs-2">


                                        @if ($user->is_active)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-default bg-gray-light">Inactive</span>
                                        @endif


                                    </td>


                                    <td class="col-md-1 col-xs-2">
                                        <div class="btn-group">
                                            <a href="{{action('Admin\UserController@edit',$user->id)}}"
                                               class="btn btn-default btn-xs" title="Edit"><span
                                                        class="fa fa-edit"></span></a>
                                            <form action="{{action('Admin\UserController@destroy',$user->id)}}"
                                                  class="inline form-delete-{{$user->id}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"
                                                        class="btn btn-danger btn-xs btn-delete-{{$user->id}}"
                                                        title="Delete"><span
                                                            class="icon-trash"></span>
                                                </button>

                                                @include('component.sweetalert-delete', ['button' => '.btn-delete-'.$user->id, 'form' => '.form-delete-'.$user->id, 'text' => 'This item <span style="color:red;">'.$user->username.'</span> will be permanently deleted'])
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END table-responsive-->
                </div>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-4">
                            @if ($users->total() > 0)
                                <span>{{ $users->firstItem()}} - {{$users->lastItem()}}
                                    of {{$users->total()}} record(s)</span>
                            @else
                                <span>No record found.</span>
                            @endif

                        </div>
                        <div class="col-xs-8">
                            {{--   @include('template.pagination')--}}
                            <div class="pull-right">
                                {{$users->appends(['username'=>$username, 'email' => $email])->links()}}
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END panel-->
                </div>
            </div>
        </div>
    </div>
@stop
















