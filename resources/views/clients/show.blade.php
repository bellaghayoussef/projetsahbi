@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Client' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('clients.client.destroy', $client->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('clients.client.index') }}" class="btn btn-primary" title="{{ trans('clients.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('clients.client.create') }}" class="btn btn-success" title="{{ trans('clients.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('clients.client.edit', $client->id ) }}" class="btn btn-primary" title="{{ trans('clients.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('clients.delete') }}" onclick="return confirm(&quot;{{ trans('clients.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('clients.first_name') }}</dt>
            <dd>{{ $client->first_name }}</dd>
            <dt>{{ trans('clients.last_name') }}</dt>
            <dd>{{ $client->last_name }}</dd>
            <dt>{{ trans('clients.phone') }}</dt>
            <dd>{{ $client->phone }}</dd>
            <dt>{{ trans('clients.email') }}</dt>
            <dd>{{ $client->email }}</dd>
            <dt>{{ trans('clients.ud') }}</dt>
            <dd>{{ $client->ud }}</dd>
            <dt>{{ trans('clients.photo_ud_frent') }}</dt>
            <dd>{{ $client->photo_ud_frent }}</dd>
            <dt>{{ trans('clients.photo_ud_back') }}</dt>
            <dd>{{ $client->photo_ud_back }}</dd>
            <dt>{{ trans('clients.password') }}</dt>
            <dd>{{ $client->password }}</dd>
            <dt>{{ trans('clients.contry_id') }}</dt>
            <dd>{{ optional($client->contry)->id }}</dd>
            <dt>{{ trans('clients.accepted') }}</dt>
            <dd>{{ $client->accepted }}</dd>
            <dt>{{ trans('clients.refused') }}</dt>
            <dd>{{ $client->refused }}</dd>

        </dl>

    </div>
</div>

@endsection