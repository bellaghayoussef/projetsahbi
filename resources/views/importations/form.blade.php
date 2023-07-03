
<div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
    <label for="client_id" class="col-md-2 control-label">{{ trans('importations.client_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="client_id" name="client_id">
        	    <option value="" style="display: none;" {{ old('client_id', optional($importation)->client_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('importations.client_id__placeholder') }}</option>
        	@foreach ($clients as $key => $client)
			    <option value="{{ $key }}" {{ old('client_id', optional($importation)->client_id) == $key ? 'selected' : '' }}>
			    	{{ $client }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('client_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('CER_TYPE') ? 'has-error' : '' }}">
    <label for="CER_TYPE" class="col-md-2 control-label">{{ trans('importations.CER_TYPE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="CER_TYPE" type="text" id="CER_TYPE" value="{{ old('CER_TYPE', optional($importation)->CER_TYPE) }}" minlength="1" placeholder="{{ trans('importations.CER_TYPE__placeholder') }}">
        {!! $errors->first('CER_TYPE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('CER_LANG') ? 'has-error' : '' }}">
    <label for="CER_LANG" class="col-md-2 control-label">{{ trans('importations.CER_LANG') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="CER_LANG" type="text" id="CER_LANG" value="{{ old('CER_LANG', optional($importation)->CER_LANG) }}" minlength="1" placeholder="{{ trans('importations.CER_LANG__placeholder') }}">
        {!! $errors->first('CER_LANG', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('COMP_ID') ? 'has-error' : '' }}">
    <label for="COMP_ID" class="col-md-2 control-label">{{ trans('importations.COMP_ID') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="COMP_ID" type="text" id="COMP_ID" value="{{ old('COMP_ID', optional($importation)->COMP_ID) }}" minlength="1" placeholder="{{ trans('importations.COMP_ID__placeholder') }}">


        {!! $errors->first('COMP_ID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EUSER_QID') ? 'has-error' : '' }}">
    <label for="EUSER_QID" class="col-md-2 control-label">{{ trans('importations.EUSER_QID') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EUSER_QID" type="text" id="EUSER_QID" value="{{ old('EUSER_QID', optional($importation)->EUSER_QID) }}" minlength="1" placeholder="{{ trans('importations.EUSER_QID__placeholder') }}">
        {!! $errors->first('EUSER_QID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_NAME') ? 'has-error' : '' }}">
    <label for="EXP_NAME" class="col-md-2 control-label">{{ trans('importations.EXP_NAME') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_NAME" type="text" id="EXP_NAME" value="{{ old('EXP_NAME', optional($importation)->EXP_NAME) }}" minlength="1" placeholder="{{ trans('importations.EXP_NAME__placeholder') }}">
        {!! $errors->first('EXP_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_TEL') ? 'has-error' : '' }}">
    <label for="EXP_TEL" class="col-md-2 control-label">{{ trans('importations.EXP_TEL') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_TEL" type="text" id="EXP_TEL" value="{{ old('EXP_TEL', optional($importation)->EXP_TEL) }}" minlength="1" placeholder="{{ trans('importations.EXP_TEL__placeholder') }}">
        {!! $errors->first('EXP_TEL', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_QID') ? 'has-error' : '' }}">
    <label for="EXP_QID" class="col-md-2 control-label">{{ trans('importations.EXP_QID') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_QID" type="text" id="EXP_QID" value="{{ old('EXP_QID', optional($importation)->EXP_QID) }}" minlength="1" placeholder="{{ trans('importations.EXP_QID__placeholder') }}">
        {!! $errors->first('EXP_QID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_FAX') ? 'has-error' : '' }}">
    <label for="EXP_FAX" class="col-md-2 control-label">{{ trans('importations.EXP_FAX') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_FAX" type="text" id="EXP_FAX" value="{{ old('EXP_FAX', optional($importation)->EXP_FAX) }}" minlength="1" placeholder="{{ trans('importations.EXP_FAX__placeholder') }}">
        {!! $errors->first('EXP_FAX', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_COUNTRY') ? 'has-error' : '' }}">
    <label for="EXP_COUNTRY" class="col-md-2 control-label">{{ trans('importations.EXP_COUNTRY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_COUNTRY" type="number" id="EXP_COUNTRY" value="{{ old('EXP_COUNTRY', optional($importation)->EXP_COUNTRY) }}" placeholder="{{ trans('importations.EXP_COUNTRY__placeholder') }}">
        {!! $errors->first('EXP_COUNTRY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_NAME') ? 'has-error' : '' }}">
    <label for="IMP_NAME" class="col-md-2 control-label">{{ trans('importations.IMP_NAME') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_NAME" type="text" id="IMP_NAME" value="{{ old('IMP_NAME', optional($importation)->IMP_NAME) }}" minlength="1" placeholder="{{ trans('importations.IMP_NAME__placeholder') }}">
        {!! $errors->first('IMP_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_ADDRESS') ? 'has-error' : '' }}">
    <label for="IMP_ADDRESS" class="col-md-2 control-label">{{ trans('importations.IMP_ADDRESS') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_ADDRESS" type="text" id="IMP_ADDRESS" value="{{ old('IMP_ADDRESS', optional($importation)->IMP_ADDRESS) }}" minlength="1" placeholder="{{ trans('importations.IMP_ADDRESS__placeholder') }}">
        {!! $errors->first('IMP_ADDRESS', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_FAX') ? 'has-error' : '' }}">
    <label for="IMP_FAX" class="col-md-2 control-label">{{ trans('importations.IMP_FAX') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_FAX" type="text" id="IMP_FAX" value="{{ old('IMP_FAX', optional($importation)->IMP_FAX) }}" minlength="1" placeholder="{{ trans('importations.IMP_FAX__placeholder') }}">
        {!! $errors->first('IMP_FAX', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_TEL') ? 'has-error' : '' }}">
    <label for="IMP_TEL" class="col-md-2 control-label">{{ trans('importations.IMP_TEL') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_TEL" type="text" id="IMP_TEL" value="{{ old('IMP_TEL', optional($importation)->IMP_TEL) }}" minlength="1" placeholder="{{ trans('importations.IMP_TEL__placeholder') }}">
        {!! $errors->first('IMP_TEL', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_POBOX') ? 'has-error' : '' }}">
    <label for="IMP_POBOX" class="col-md-2 control-label">{{ trans('importations.IMP_POBOX') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_POBOX" type="text" id="IMP_POBOX" value="{{ old('IMP_POBOX', optional($importation)->IMP_POBOX) }}" minlength="1" placeholder="{{ trans('importations.IMP_POBOX__placeholder') }}">
        {!! $errors->first('IMP_POBOX', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_COUNTRY') ? 'has-error' : '' }}">
    <label for="IMP_COUNTRY" class="col-md-2 control-label">{{ trans('importations.IMP_COUNTRY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_COUNTRY" type="number" id="IMP_COUNTRY" value="{{ old('IMP_COUNTRY', optional($importation)->IMP_COUNTRY) }}" placeholder="{{ trans('importations.IMP_COUNTRY__placeholder') }}">
        {!! $errors->first('IMP_COUNTRY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ORIGIN_COUNTRY') ? 'has-error' : '' }}">
    <label for="ORIGIN_COUNTRY" class="col-md-2 control-label">{{ trans('importations.ORIGIN_COUNTRY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="ORIGIN_COUNTRY" type="number" id="ORIGIN_COUNTRY" value="{{ old('ORIGIN_COUNTRY', optional($importation)->ORIGIN_COUNTRY) }}" placeholder="{{ trans('importations.ORIGIN_COUNTRY__placeholder') }}">
        {!! $errors->first('ORIGIN_COUNTRY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('SHIPPING_PLACE') ? 'has-error' : '' }}">
    <label for="SHIPPING_PLACE" class="col-md-2 control-label">{{ trans('importations.SHIPPING_PLACE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="SHIPPING_PLACE" type="text" id="SHIPPING_PLACE" value="{{ old('SHIPPING_PLACE', optional($importation)->SHIPPING_PLACE) }}" minlength="1" placeholder="{{ trans('importations.SHIPPING_PLACE__placeholder') }}">
        {!! $errors->first('SHIPPING_PLACE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ENTERY_PORT') ? 'has-error' : '' }}">
    <label for="ENTERY_PORT" class="col-md-2 control-label">{{ trans('importations.ENTERY_PORT') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="ENTERY_PORT" type="text" id="ENTERY_PORT" value="{{ old('ENTERY_PORT', optional($importation)->ENTERY_PORT) }}" minlength="1" placeholder="{{ trans('importations.ENTERY_PORT__placeholder') }}">
        {!! $errors->first('ENTERY_PORT', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXPECTED_ARRIVAL_DATE') ? 'has-error' : '' }}">
    <label for="EXPECTED_ARRIVAL_DATE" class="col-md-2 control-label">{{ trans('importations.EXPECTED_ARRIVAL_DATE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXPECTED_ARRIVAL_DATE" type="text" id="EXPECTED_ARRIVAL_DATE" value="{{ old('EXPECTED_ARRIVAL_DATE', optional($importation)->EXPECTED_ARRIVAL_DATE) }}" placeholder="{{ trans('importations.EXPECTED_ARRIVAL_DATE__placeholder') }}">
        {!! $errors->first('EXPECTED_ARRIVAL_DATE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('TRANSPORT') ? 'has-error' : '' }}">
    <label for="TRANSPORT" class="col-md-2 control-label">{{ trans('importations.TRANSPORT') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="TRANSPORT" type="text" id="TRANSPORT" value="{{ old('TRANSPORT', optional($importation)->TRANSPORT) }}" minlength="1" placeholder="{{ trans('importations.TRANSPORT__placeholder') }}">
        {!! $errors->first('TRANSPORT', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('SHIPPING_DATE') ? 'has-error' : '' }}">
    <label for="SHIPPING_DATE" class="col-md-2 control-label">{{ trans('importations.SHIPPING_DATE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="SHIPPING_DATE" type="text" id="SHIPPING_DATE" value="{{ old('SHIPPING_DATE', optional($importation)->SHIPPING_DATE) }}" placeholder="{{ trans('importations.SHIPPING_DATE__placeholder') }}">
        {!! $errors->first('SHIPPING_DATE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('APPLICANT_NAME') ? 'has-error' : '' }}">
    <label for="APPLICANT_NAME" class="col-md-2 control-label">{{ trans('importations.APPLICANT_NAME') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="APPLICANT_NAME" type="text" id="APPLICANT_NAME" value="{{ old('APPLICANT_NAME', optional($importation)->APPLICANT_NAME) }}" minlength="1" placeholder="{{ trans('importations.APPLICANT_NAME__placeholder') }}">
        {!! $errors->first('APPLICANT_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('APPLICANT_TEL') ? 'has-error' : '' }}">
    <label for="APPLICANT_TEL" class="col-md-2 control-label">{{ trans('importations.APPLICANT_TEL') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="APPLICANT_TEL" type="text" id="APPLICANT_TEL" value="{{ old('APPLICANT_TEL', optional($importation)->APPLICANT_TEL) }}" minlength="1" placeholder="{{ trans('importations.APPLICANT_TEL__placeholder') }}">
        {!! $errors->first('APPLICANT_TEL', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_NATIONALITY') ? 'has-error' : '' }}">
    <label for="EXP_NATIONALITY" class="col-md-2 control-label">{{ trans('importations.EXP_NATIONALITY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_NATIONALITY" type="text" id="EXP_NATIONALITY" value="{{ old('EXP_NATIONALITY', optional($importation)->EXP_NATIONALITY) }}" minlength="1" placeholder="{{ trans('importations.EXP_NATIONALITY__placeholder') }}">
        {!! $errors->first('EXP_NATIONALITY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_PASSPORT_NUM') ? 'has-error' : '' }}">
    <label for="EXP_PASSPORT_NUM" class="col-md-2 control-label">{{ trans('importations.EXP_PASSPORT_NUM') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_PASSPORT_NUM" type="text" id="EXP_PASSPORT_NUM" value="{{ old('EXP_PASSPORT_NUM', optional($importation)->EXP_PASSPORT_NUM) }}" minlength="1" placeholder="{{ trans('importations.EXP_PASSPORT_NUM__placeholder') }}">
        {!! $errors->first('EXP_PASSPORT_NUM', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('EXP_PASSPORT_NUM') ? 'has-error' : '' }}">
    <label for="EXP_PASSPORT_NUM" class="col-md-2 control-label">{{ trans('importations.files') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="files" type="file" id="files" value="{{ old('files', optional($importation)->files) }}" minlength="1" placeholder="{{ trans('importations.files') }}">
        {!! $errors->first('EXP_PASSPORT_NUM', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<br><br><br><br>
