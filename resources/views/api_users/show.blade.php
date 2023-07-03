@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Api User' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('api_users.api_user.destroy', $apiUser->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('api_users.api_user.index') }}" class="btn btn-primary" title="{{ trans('api_users.show_all') }}">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('api_users.api_user.create') }}" class="btn btn-success" title="{{ trans('api_users.create') }}">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('api_users.api_user.edit', $apiUser->id ) }}" class="btn btn-primary" title="{{ trans('api_users.edit') }}">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('api_users.delete') }}" onclick="return confirm(&quot;{{ trans('api_users.confirm_delete') }}?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('api_users.Username') }}</dt>
            <dd>{{ $apiUser->Username }}</dd>
            <dt>{{ trans('api_users.Password') }}</dt>
            <dd>{{ $apiUser->Password }}</dd>
            <dt>{{ trans('api_users.access_token') }}</dt>
            <dd>{{ $apiUser->access_token }}</dd>

        </dl>

    </div>
</div>

@endsection
