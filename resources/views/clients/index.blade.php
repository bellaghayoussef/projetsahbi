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
                <h4 class="mt-5 mb-5">{{ trans('clients.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('clients.client.create') }}" class="btn btn-success" title="{{ trans('clients.create') }}">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($clients) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('clients.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('clients.first_name') }}</th>
                            <th>{{ trans('clients.last_name') }}</th>
                            <th>{{ trans('clients.phone') }}</th>
                            <th>{{ trans('clients.email') }}</th>
                            <th>{{ trans('clients.ud') }}</th>
                            <th>{{ trans('clients.photo_ud_frent') }}</th>
                            <th>{{ trans('clients.photo_ud_back') }}</th>
                            <th>{{ trans('clients.password') }}</th>
                            <th>{{ trans('clients.contry_id') }}</th>
                            <th>{{ trans('clients.accepted') }}</th>
                            <th>{{ trans('clients.refused') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->first_name }}</td>
                            <td>{{ $client->last_name }}</td>
                            <td>{{ $client->phone }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->ud }}</td>
                            <td>{{ $client->photo_ud_frent }}</td>
                            <td>{{ $client->photo_ud_back }}</td>
                            <td>{{ $client->password }}</td>
                            <td>{{ optional($client->contry)->id }}</td>
                            <td>{{ $client->accepted }}</td>
                            <td>{{ $client->refused }}</td>

                            <td>

                                <form method="POST" action="{!! route('clients.client.destroy', $client->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('clients.client.show', $client->id ) }}" class="btn btn-info" title="{{ trans('clients.show') }}">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('clients.client.edit', $client->id ) }}" class="btn btn-primary" title="{{ trans('clients.edit') }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('clients.delete') }}" onclick="return confirm(&quot;{{ trans('clients.confirm_delete') }}&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
            {!! $clients->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection