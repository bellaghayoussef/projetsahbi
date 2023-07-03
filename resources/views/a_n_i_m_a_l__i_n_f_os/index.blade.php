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
                <h4 class="mt-5 mb-5">{{ trans('a_n_i_m_a_l__i_n_f_os.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.create') }}" class="btn btn-success" title="{{ trans('a_n_i_m_a_l__i_n_f_os.create') }}">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($aNIMALINFOs) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('a_n_i_m_a_l__i_n_f_os.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ORIGIN_COUNTRY') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.TRANSIET_COUNTRY') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SPECIES') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SEX') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_NUMBER') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_USE') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANIMAL_BREED') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.client_id') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($aNIMALINFOs as $aNIMALINFO)
                        <tr>
                            <td>{{ $aNIMALINFO->ORIGIN_COUNTRY }}</td>
                            <td>{{ $aNIMALINFO->TRANSIET_COUNTRY }}</td>
                            <td>{{ $aNIMALINFO->ANML_SPECIES }}</td>
                            <td>{{ $aNIMALINFO->ANML_SEX }}</td>
                            <td>{{ $aNIMALINFO->ANML_NUMBER }}</td>
                            <td>{{ $aNIMALINFO->ANML_USE }}</td>
                            <td>{{ $aNIMALINFO->ANIMAL_BREED }}</td>
                            <td>{{ optional($aNIMALINFO->client)->created_at }}</td>

                            <td>

                                <form method="POST" action="{!! route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.destroy', $aNIMALINFO->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.show', $aNIMALINFO->id ) }}" class="btn btn-info" title="{{ trans('a_n_i_m_a_l__i_n_f_os.show') }}">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.edit', $aNIMALINFO->id ) }}" class="btn btn-primary" title="{{ trans('a_n_i_m_a_l__i_n_f_os.edit') }}">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('a_n_i_m_a_l__i_n_f_os.delete') }}" onclick="return confirm(&quot;{{ trans('a_n_i_m_a_l__i_n_f_os.confirm_delete') }}&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
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
            {!! $aNIMALINFOs->render() !!}
        </div>

        @endif

    </div>
@endsection
