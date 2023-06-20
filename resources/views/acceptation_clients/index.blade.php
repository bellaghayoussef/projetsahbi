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
                <h4 class="mt-5 mb-5">{{ trans('acceptation_clients.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">

            </div>

        </div>

        @if(count($acceptationClients) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('acceptation_clients.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('acceptation_clients.User_id') }}</th>
                            <th>{{ trans('users.ud') }}</th>
                            <th>{{ trans('acceptation_clients.Client_id') }}</th>
                            <th>{{ trans('clients.ud') }}</th>

                            <th>{{ trans('acceptation_clients.date') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($acceptationClients as $acceptationClient)
                        <tr>
                            <td>{{ optional($acceptationClient->user)->first_name }} {{ optional($acceptationClient->user)->last_name }}</td>
                            <td>{{ optional($acceptationClient->user)->ud }} </td>
                            <td>{{ optional($acceptationClient->client)->first_name }} {{ optional($acceptationClient->client)->last_name }}</td>
                            <td>{{ optional($acceptationClient->client)->ud }} </td>

                            <td>{{ $acceptationClient->created_at }}</td>

                            <td>


                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('acceptation_clients.acceptation_client.show', $acceptationClient->id ) }}" class="btn btn-info" title="{{ trans('acceptation_clients.show') }}">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>

                                    </div>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $acceptationClients->render() !!}
        </div>

        @endif

    </div>
@endsection
