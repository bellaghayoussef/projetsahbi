@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Acceptation Client' }}</h4>
        </span>

        <div class="pull-right">
@if(auth()->user()->hasRole('Super-Admin'))


            <form method="POST" action="{!! route('acceptation_clients.acceptation_client.destroy', $acceptationClient->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('acceptation_clients.acceptation_client.index') }}" class="btn btn-primary" title="{{ trans('acceptation_clients.show_all') }}">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('acceptation_clients.acceptation_client.create') }}" class="btn btn-success" title="{{ trans('acceptation_clients.create') }}">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('acceptation_clients.acceptation_client.edit', $acceptationClient->id ) }}" class="btn btn-primary" title="{{ trans('acceptation_clients.edit') }}">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('acceptation_clients.delete') }}" onclick="return confirm(&quot;{{ trans('acceptation_clients.confirm_delete') }}?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>
            @endif
        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('acceptation_clients.User_id') }}</dt>
            <dd>{{ optional($acceptationClient->user)->first_name }}</dd>
            <dt>{{ trans('acceptation_clients.Client_id') }}</dt>
            <dd>{{ optional($acceptationClient->client)->created_at }}</dd>
            <dt>{{ trans('acceptation_clients.commenter') }}</dt>
            <dd>{{ $acceptationClient->commenter }}</dd>

        </dl>

    </div>
</div>

@endsection
