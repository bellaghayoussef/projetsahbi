@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Users' }}</h4>
        </span>



    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('users.first_name') }}</dt>
            <dd>{{ $users->first_name }}</dd>
            <dt>{{ trans('users.last_name') }}</dt>
            <dd>{{ $users->last_name }}</dd>
            <dt>{{ trans('users.ud') }}</dt>
            <dd>{{ $users->ud }}</dd>
            <dt>{{ trans('users.email') }}</dt>
            <dd>{{ $users->email }}</dd>
            <dt>{{ trans('users.email_verified_at') }}</dt>
            <dd>{{ $users->email_verified_at }}</dd>
            <dt>{{ trans('users.password') }}</dt>
            <dd>{{ $users->password }}</dd>

        </dl>

    </div>
</div>

@endsection
