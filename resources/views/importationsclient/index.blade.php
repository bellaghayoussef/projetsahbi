@extends('layouts.appclient')

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
                <h4 class="mt-5 mb-5">{{ trans('importations.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('importations.client.create') }}" class="btn btn-success" title="{{ trans('importations.create') }}">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($importations) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('importations.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('importations.client_id') }}</th>
                            <th>{{ trans('importations.CER_TYPE') }}</th>
                            <th>{{ trans('importations.CER_LANG') }}</th>
                            <th>{{ trans('importations.COMP_ID') }}</th>
                            <th>{{ trans('importations.EUSER_QID') }}</th>
                            <th>{{ trans('importations.EXP_NAME') }}</th>
                            <th>{{ trans('importations.EXP_TEL') }}</th>
                            <th>{{ trans('importations.EXP_QID') }}</th>
                            <th>{{ trans('importations.EXP_FAX') }}</th>
                            <th>{{ trans('importations.EXP_COUNTRY') }}</th>
                            <th>{{ trans('importations.IMP_NAME') }}</th>
                            <th>{{ trans('importations.IMP_ADDRESS') }}</th>
                            <th>{{ trans('importations.IMP_FAX') }}</th>
                            <th>{{ trans('importations.IMP_TEL') }}</th>
                            <th>{{ trans('importations.IMP_POBOX') }}</th>
                            <th>{{ trans('importations.IMP_COUNTRY') }}</th>
                            <th>{{ trans('importations.ORIGIN_COUNTRY') }}</th>
                            <th>{{ trans('importations.SHIPPING_PLACE') }}</th>
                            <th>{{ trans('importations.ENTERY_PORT') }}</th>
                            <th>{{ trans('importations.EXPECTED_ARRIVAL_DATE') }}</th>
                            <th>{{ trans('importations.TRANSPORT') }}</th>
                            <th>{{ trans('importations.SHIPPING_DATE') }}</th>
                            <th>{{ trans('importations.APPLICANT_NAME') }}</th>
                            <th>{{ trans('importations.APPLICANT_TEL') }}</th>
                            <th>{{ trans('importations.EXP_NATIONALITY') }}</th>
                            <th>{{ trans('importations.EXP_PASSPORT_NUM') }}</th>
                            <th>{{ trans('importations.accepted') }}</th>
                            <th>{{ trans('importations.reson') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($importations as $importation)
                        <tr>
                            <td>{{ optional($importation->client)->created_at }}</td>
                            <td>{{ $importation->CER_TYPE }}</td>
                            <td>{{ $importation->CER_LANG }}</td>
                            <td>{{ optional($importation->cOMP)->id }}</td>
                            <td>{{ $importation->EUSER_QID }}</td>
                            <td>{{ $importation->EXP_NAME }}</td>
                            <td>{{ $importation->EXP_TEL }}</td>
                            <td>{{ $importation->EXP_QID }}</td>
                            <td>{{ $importation->EXP_FAX }}</td>
                            <td>{{ $importation->EXP_COUNTRY }}</td>
                            <td>{{ $importation->IMP_NAME }}</td>
                            <td>{{ $importation->IMP_ADDRESS }}</td>
                            <td>{{ $importation->IMP_FAX }}</td>
                            <td>{{ $importation->IMP_TEL }}</td>
                            <td>{{ $importation->IMP_POBOX }}</td>
                            <td>{{ $importation->IMP_COUNTRY }}</td>
                            <td>{{ $importation->ORIGIN_COUNTRY }}</td>
                            <td>{{ $importation->SHIPPING_PLACE }}</td>
                            <td>{{ $importation->ENTERY_PORT }}</td>
                            <td>{{ $importation->EXPECTED_ARRIVAL_DATE }}</td>
                            <td>{{ $importation->TRANSPORT }}</td>
                            <td>{{ $importation->SHIPPING_DATE }}</td>
                            <td>{{ $importation->APPLICANT_NAME }}</td>
                            <td>{{ $importation->APPLICANT_TEL }}</td>
                            <td>{{ $importation->EXP_NATIONALITY }}</td>
                            <td>{{ $importation->EXP_PASSPORT_NUM }}</td>
                            <td>{{ $importation->accepted }}</td>
                            <td>{{ $importation->reson }}</td>

                            <td>

                                <form method="POST" action="{!! route('importations.client.destroy', $importation->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('importations.client.show', $importation->id ) }}" class="btn btn-info" title="{{ trans('importations.show') }}">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('importations.client.edit', $importation->id ) }}" class="btn btn-primary" title="{{ trans('importations.edit') }}">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('importations.delete') }}" onclick="return confirm(&quot;{{ trans('importations.confirm_delete') }}&quot;)">
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

        </div>

        @endif

    </div>
@endsection
