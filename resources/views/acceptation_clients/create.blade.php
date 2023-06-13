@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('acceptation_clients.create') }}</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('acceptation_clients.acceptation_client.index') }}" class="btn btn-primary" title="{{ trans('acceptation_clients.show_all') }}">
                    <span class="fa fa-th-list" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('acceptation_clients.acceptation_client.store') }}" accept-charset="UTF-8" id="create_acceptation_client_form" name="create_acceptation_client_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('acceptation_clients.form', [
                                        'acceptationClient' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('acceptation_clients.add') }}">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


