@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('a_n_i_m_a_l__i_n_f_os.create') }}</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.index') }}" class="btn btn-primary" title="{{ trans('a_n_i_m_a_l__i_n_f_os.show_all') }}">
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

            <form method="POST" action="{{ route('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.store') }}" accept-charset="UTF-8" id="create_a_n_i_m_a_l__i_n_f_o_form" name="create_a_n_i_m_a_l__i_n_f_o_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('a_n_i_m_a_l__i_n_f_os.form', [
                                        'aNIMALINFO' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('a_n_i_m_a_l__i_n_f_os.add') }}">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


