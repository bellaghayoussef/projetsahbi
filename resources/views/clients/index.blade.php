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
                    <span class="fa fa-plus" aria-hidden="true"></span>
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

                            <th>{{ trans('clients.contry_id') }}</th>
                            <th>{{ trans('clients.accepted') }}</th>


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
                            <td> <img class="avatar avatar-sm me-3 border-radius-lg" src="{{ asset($client->photo_ud_frent) }}" alt=""> </td>
                            <td><img class="avatar avatar-sm me-3 border-radius-lg" src="{{ asset($client->photo_ud_back) }}" alt=""></td>

                            <td>{{ optional($client->contry)->name }}</td>
                            <td>


                                @if ($client->accepted == 1)
                                <p class="btn btn-info">{{ trans('clients.accepted') }}</p>
                                @elseif ($client->refused == 1)
                                <p class="btn btn-danger">  {{ trans('clients.refused') }}</p>
                                @endif





                            </td>


                            <td>


                                    <div class="btn-group btn-group-xs pull-right" role="group">

                                        <a href="{{ route('clients.client.show', $client->id ) }}" class="btn btn-info" title="{{ trans('clients.show') }}">
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
            {!! $clients->render() !!}
        </div>

        @endif

    </div>
@endsection
