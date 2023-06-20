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
                <h4 class="mt-5 mb-5">{{ trans('countries.model_plural') }}</h4>
            </div>

            {{-- <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('countries.countries.create') }}" class="btn btn-success" title="{{ trans('countries.create') }}">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div> --}}

        </div>

        @if(count($countriesObjects) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('countries.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table id="files_list" class="table table-striped dt-responsive  " style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ trans('countries.iso') }}</th>
                            <th>{{ trans('countries.name') }}</th>
                            <th>{{ trans('countries.iso3') }}</th>
                            <th>{{ trans('countries.numcode') }}</th>
                            <th>{{ trans('countries.phonecode') }}</th>
                            <th>{{ trans('countries.active') }}</th>

                            {{-- <th></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($countriesObjects as $countries)
                        <tr>
                            <td>{{ $countries->iso }}</td>
                            <td>{{ $countries->name }}</td>
                            <td>{{ $countries->iso3 }}</td>
                            <td>{{ $countries->numcode }}</td>
                            <td>{{ $countries->phonecode }}</td>
                            <td>{{ $countries->active }}</td>

                            {{-- <td>

                                <form method="POST" action="{!! route('countries.countries.destroy', $countries->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('countries.countries.show', $countries->id ) }}" class="btn btn-info" title="{{ trans('countries.show') }}">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('countries.countries.edit', $countries->id ) }}" class="btn btn-primary" title="{{ trans('countries.edit') }}">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('countries.delete') }}" onclick="return confirm(&quot;{{ trans('countries.confirm_delete') }}&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td> --}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $countriesObjects->render() !!}
        </div>

        @endif

    </div>
@endsection
