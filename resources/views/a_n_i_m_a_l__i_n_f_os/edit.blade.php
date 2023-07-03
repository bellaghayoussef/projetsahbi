@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'A N I M A L  I N F O' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.index') }}" class="btn btn-primary" title="{{ trans('a_n_i_m_a_l__i_n_f_os.show_all') }}">
                    <span class="fa fa-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.create') }}" class="btn btn-success" title="{{ trans('a_n_i_m_a_l__i_n_f_os.create') }}">
                    <span class="fa fa-plus" aria-hidden="true"></span>
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

            <form method="POST" action="{{ route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.update', $aNIMALINFO->id) }}" id="edit_a_n_i_m_a_l__i_n_f_o_form" name="edit_a_n_i_m_a_l__i_n_f_o_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('a_n_i_m_a_l__i_n_f_os.form', [
                                        'aNIMALINFO' => $aNIMALINFO,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('a_n_i_m_a_l__i_n_f_os.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
