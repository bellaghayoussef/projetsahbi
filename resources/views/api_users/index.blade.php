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
                <h4 class="mt-5 mb-5">{{ trans('api_users.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('api_users.api_user.create') }}" class="btn btn-success" title="{{ trans('api_users.create') }}">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($apiUsers) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('api_users.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('api_users.Username') }}</th>
                            <th>{{ trans('api_users.Password') }}</th>
                            <th>{{ trans('api_users.access_token') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($apiUsers as $apiUser)
                        <tr>
                            <td>{{ $apiUser->Username }}</td>
                            <td>{{ $apiUser->Password }}</td>
                            <td>{{ $apiUser->access_token }}</td>

                            <td>

                                <form method="POST" action="{!! route('api_users.api_user.destroy', $apiUser->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('api_users.api_user.show', $apiUser->id ) }}" class="btn btn-info" title="{{ trans('api_users.show') }}">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('api_users.api_user.edit', $apiUser->id ) }}" class="btn btn-primary" title="{{ trans('api_users.edit') }}">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('api_users.delete') }}" onclick="return confirm(&quot;{{ trans('api_users.confirm_delete') }}&quot;)">
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
            {!! $apiUsers->render() !!}
        </div>

        @endif

    </div>
@endsection
