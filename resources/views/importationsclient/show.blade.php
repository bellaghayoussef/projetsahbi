@extends('layouts.appclient')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Importation' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('importations.importation.destroy', $importation->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('importations.importation.index') }}" class="btn btn-primary" title="{{ trans('importations.show_all') }}">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('importations.importation.create') }}" class="btn btn-success" title="{{ trans('importations.create') }}">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('importations.importation.edit', $importation->id ) }}" class="btn btn-primary" title="{{ trans('importations.edit') }}">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('importations.delete') }}" onclick="return confirm(&quot;{{ trans('importations.confirm_delete') }}?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('importations.client_id') }}</dt>
            <dd>{{ optional($importation->client)->created_at }}</dd>
            <dt>{{ trans('importations.CER_TYPE') }}</dt>
            <dd>{{ $importation->CER_TYPE }}</dd>
            <dt>{{ trans('importations.CER_LANG') }}</dt>
            <dd>{{ $importation->CER_LANG }}</dd>
            <dt>{{ trans('importations.COMP_ID') }}</dt>
            <dd>{{ optional($importation->cOMP)->id }}</dd>
            <dt>{{ trans('importations.EUSER_QID') }}</dt>
            <dd>{{ $importation->EUSER_QID }}</dd>
            <dt>{{ trans('importations.EXP_NAME') }}</dt>
            <dd>{{ $importation->EXP_NAME }}</dd>
            <dt>{{ trans('importations.EXP_TEL') }}</dt>
            <dd>{{ $importation->EXP_TEL }}</dd>
            <dt>{{ trans('importations.EXP_QID') }}</dt>
            <dd>{{ $importation->EXP_QID }}</dd>
            <dt>{{ trans('importations.EXP_FAX') }}</dt>
            <dd>{{ $importation->EXP_FAX }}</dd>
            <dt>{{ trans('importations.EXP_COUNTRY') }}</dt>
            <dd>{{ $importation->EXP_COUNTRY }}</dd>
            <dt>{{ trans('importations.IMP_NAME') }}</dt>
            <dd>{{ $importation->IMP_NAME }}</dd>
            <dt>{{ trans('importations.IMP_ADDRESS') }}</dt>
            <dd>{{ $importation->IMP_ADDRESS }}</dd>
            <dt>{{ trans('importations.IMP_FAX') }}</dt>
            <dd>{{ $importation->IMP_FAX }}</dd>
            <dt>{{ trans('importations.IMP_TEL') }}</dt>
            <dd>{{ $importation->IMP_TEL }}</dd>
            <dt>{{ trans('importations.IMP_POBOX') }}</dt>
            <dd>{{ $importation->IMP_POBOX }}</dd>
            <dt>{{ trans('importations.IMP_COUNTRY') }}</dt>
            <dd>{{ $importation->IMP_COUNTRY }}</dd>
            <dt>{{ trans('importations.ORIGIN_COUNTRY') }}</dt>
            <dd>{{ $importation->ORIGIN_COUNTRY }}</dd>
            <dt>{{ trans('importations.SHIPPING_PLACE') }}</dt>
            <dd>{{ $importation->SHIPPING_PLACE }}</dd>
            <dt>{{ trans('importations.ENTERY_PORT') }}</dt>
            <dd>{{ $importation->ENTERY_PORT }}</dd>
            <dt>{{ trans('importations.EXPECTED_ARRIVAL_DATE') }}</dt>
            <dd>{{ $importation->EXPECTED_ARRIVAL_DATE }}</dd>
            <dt>{{ trans('importations.TRANSPORT') }}</dt>
            <dd>{{ $importation->TRANSPORT }}</dd>
            <dt>{{ trans('importations.SHIPPING_DATE') }}</dt>
            <dd>{{ $importation->SHIPPING_DATE }}</dd>
            <dt>{{ trans('importations.APPLICANT_NAME') }}</dt>
            <dd>{{ $importation->APPLICANT_NAME }}</dd>
            <dt>{{ trans('importations.APPLICANT_TEL') }}</dt>
            <dd>{{ $importation->APPLICANT_TEL }}</dd>
            <dt>{{ trans('importations.EXP_NATIONALITY') }}</dt>
            <dd>{{ $importation->EXP_NATIONALITY }}</dd>
            <dt>{{ trans('importations.EXP_PASSPORT_NUM') }}</dt>
            <dd>{{ $importation->EXP_PASSPORT_NUM }}</dd>
            <dt>{{ trans('importations.accepted') }}</dt>
            <dd>{{ $importation->accepted }}</dd>
            <dt>{{ trans('importations.reson') }}</dt>
            <dd>{{ $importation->reson }}</dd>

        </dl>

    </div>
</div>

@endsection
