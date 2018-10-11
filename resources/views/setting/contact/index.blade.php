@extends('layouts.app')


@section('content')

    <div class="content-heading">

        Contact


        @include('component.breadcrumb', ['items' => ['Setting', 'Contact', 'All Contacts']])
    </div>

    @include('component.flash')

    <div class="row">
        <div class="col-lg-12">
            <!-- START panel-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-12">

                            <form method="get" action="{{action('Admin\ContactController@index')}}" class="form-inline">

                                <div class="form-group m-sm">

                                    <input type="text" name="name" placeholder="Name" class="form-control"
                                           value="{{ $name  }}">
                                </div>

                                <div class="form-group m-sm">

                                    <input type="text" name="department" placeholder="Department" class="form-control"
                                           value="{{ $department  }}">
                                </div>


                                <div class="form-group m-sm">

                                    <input type="text" name="location" placeholder="Location" class="form-control"
                                           value="{{ $location  }}">
                                </div>


                                <div class="form-group m-sm">

                                    <input type="text" name="emails" placeholder="Emails" class="form-control"
                                           value="{{ $emails  }}">
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
                                <th><strong>Name</strong></th>
                                <th><strong>Department</strong></th>
                                <th><strong>Location</strong></th>
                                <th><strong>Emails</strong></th>
                                <th><strong>Actions</strong></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($contacts as $contact)
                                <tr class="">
                                    <td class="col-md-3 col-xs-3">{{$contact->name}}</td>
                                    <td class="col-md-2 col-xs-2">{{$contact->department}}</td>
                                    <td class="col-md-2 col-xs-2">{{$contact->location}}</td>
                                    <td class="col-md-4 col-xs-4">
                                        @foreach(explode(';', $contact->emails) as $email)
                                            {{$email}} <br/>
                                        @endforeach
                                    </td>

                                    <td class="col-md-1 col-xs-2">
                                        <div class="btn-group">
                                            <a href="{{action('Admin\ContactController@edit',$contact->id)}}"
                                               class="btn btn-default btn-xs" title="Edit"><span
                                                        class="fa fa-edit"></span></a>
                                            <form action="{{action('Admin\ContactController@destroy',$contact->id)}}"
                                                  class="inline form-delete-{{$contact->id}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit"
                                                        class="btn btn-danger btn-xs btn-delete-{{$contact->id}}"
                                                        title="Delete"><span
                                                            class="icon-trash"></span>
                                                </button>

                                                @include('component.sweetalert-delete', ['button' => '.btn-delete-'.$contact->id, 'form' => '.form-delete-'.$contact->id, 'text' => 'This item <span style="color:red;">'.$contact->name.'</span> will be permanently deleted'])
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
                            @if ($contacts->total() > 0)
                                <span>{{ $contacts->firstItem()}} - {{$contacts->lastItem()}}
                                    of {{$contacts->total()}} record(s)</span>
                            @else
                                <span>No record found.</span>
                            @endif

                        </div>
                        <div class="col-xs-8">
                            {{--   @include('template.pagination')--}}
                            <div class="pull-right">
                                {{$contacts->appends(['name'=>$name, 'department'=>$department, 'location'=>$location, 'emails' => $emails])->links()}}
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
















