@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('users.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('users.users.create') }}" class="btn btn-success" title="{{ trans('users.create') }}">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($usersObjects) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('users.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive table-responsive p-0">

                <table class="table align-items-center mb-0" style="   ">
                    <thead>
                        <tr>
                            <th>{{ trans('users.first_name') }}</th>
                            <th>{{ trans('users.last_name') }}</th>
                            <th>{{ trans('users.ud') }}</th>
                            <th>{{ trans('users.email') }}</th>
                            <th>{{ trans('users.role') }}</th>


                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($usersObjects as $users)
                        <tr>

                            <td>{{ $users->first_name }}</td>
                            <td>{{ $users->last_name }}</td>
                            <td>{{ $users->ud }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->getRoleNames(); }}</td>


                            <td>

                                <form method="POST" action="{!! route('users.users.destroy', $users->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('users.users.show', $users->id ) }}" class="btn btn-info" title="{{ trans('users.show') }}">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('users.users.edit', $users->id ) }}" class="btn btn-primary" title="{{ trans('users.edit') }}">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('users.delete') }}" onclick="return confirm(&quot;{{ trans('users.confirm_delete') }}&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $usersObjects->render() !!}
        </div>

        @endif

    </div>
@endsection
