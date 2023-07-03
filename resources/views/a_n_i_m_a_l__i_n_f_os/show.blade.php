@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'A N I M A L  I N F O' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.destroy', $aNIMALINFO->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.index') }}" class="btn btn-primary" title="{{ trans('a_n_i_m_a_l__i_n_f_os.show_all') }}">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.create') }}" class="btn btn-success" title="{{ trans('a_n_i_m_a_l__i_n_f_os.create') }}">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.edit', $aNIMALINFO->id ) }}" class="btn btn-primary" title="{{ trans('a_n_i_m_a_l__i_n_f_os.edit') }}">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('a_n_i_m_a_l__i_n_f_os.delete') }}" onclick="return confirm(&quot;{{ trans('a_n_i_m_a_l__i_n_f_os.confirm_delete') }}?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('a_n_i_m_a_l__i_n_f_os.ORIGIN_COUNTRY') }}</dt>
            <dd>{{ $aNIMALINFO->ORIGIN_COUNTRY }}</dd>
            <dt>{{ trans('a_n_i_m_a_l__i_n_f_os.TRANSIET_COUNTRY') }}</dt>
            <dd>{{ $aNIMALINFO->TRANSIET_COUNTRY }}</dd>
            <dt>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SPECIES') }}</dt>
            <dd>{{ $aNIMALINFO->ANML_SPECIES }}</dd>
            <dt>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SEX') }}</dt>
            <dd>{{ $aNIMALINFO->ANML_SEX }}</dd>
            <dt>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_NUMBER') }}</dt>
            <dd>{{ $aNIMALINFO->ANML_NUMBER }}</dd>
            <dt>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_USE') }}</dt>
            <dd>{{ $aNIMALINFO->ANML_USE }}</dd>
            <dt>{{ trans('a_n_i_m_a_l__i_n_f_os.ANIMAL_BREED') }}</dt>
            <dd>{{ $aNIMALINFO->ANIMAL_BREED }}</dd>
            <dt>{{ trans('a_n_i_m_a_l__i_n_f_os.client_id') }}</dt>
            <dd>{{ optional($aNIMALINFO->client)->created_at }}</dd>

        </dl>

    </div>
</div>

@endsection
