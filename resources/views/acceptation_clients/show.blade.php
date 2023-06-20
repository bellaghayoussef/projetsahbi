@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : trans('acceptation_clients.model_plural') }}</h4>
        </span>

        <div class="pull-right">

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('acceptation_clients.User_id') }}</dt>
            <dd>{{ optional($acceptationClient->user)->first_name }} {{ optional($acceptationClient->user)->last_name }}</dd>
                            <dd>{{ optional($acceptationClient->user)->ud }} </dd>
            <dt>{{ trans('acceptation_clients.Client_id') }}</dt>
            <dd>{{ optional($acceptationClient->client)->first_name }} {{ optional($acceptationClient->client)->last_name }}</dd>
                            <dd>{{ optional($acceptationClient->client)->ud }} </dd>
            <dt>{{ trans('acceptation_clients.commenter') }}</dt>
            <dd>{{ $acceptationClient->commenter }}</dd>
            <dt>{{ trans('acceptation_clients.date') }}</dt>
            <dd>{{ $acceptationClient->created_at }}</dd>

        </dl>

    </div>
</div>

@endsection
