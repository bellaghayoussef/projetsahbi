
<div class="form-group {{ $errors->has('ORIGIN_COUNTRY') ? 'has-error' : '' }}">
    <label for="ORIGIN_COUNTRY" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.ORIGIN_COUNTRY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="ORIGIN_COUNTRY" type="number" id="ORIGIN_COUNTRY" value="{{ old('ORIGIN_COUNTRY', optional($aNIMALINFO)->ORIGIN_COUNTRY) }}" placeholder="{{ trans('a_n_i_m_a_l__i_n_f_os.ORIGIN_COUNTRY__placeholder') }}">
        {!! $errors->first('ORIGIN_COUNTRY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('TRANSIET_COUNTRY') ? 'has-error' : '' }}">
    <label for="TRANSIET_COUNTRY" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.TRANSIET_COUNTRY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="TRANSIET_COUNTRY" type="number" id="TRANSIET_COUNTRY" value="{{ old('TRANSIET_COUNTRY', optional($aNIMALINFO)->TRANSIET_COUNTRY) }}" placeholder="{{ trans('a_n_i_m_a_l__i_n_f_os.TRANSIET_COUNTRY__placeholder') }}">
        {!! $errors->first('TRANSIET_COUNTRY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ANML_SPECIES') ? 'has-error' : '' }}">
    <label for="ANML_SPECIES" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SPECIES') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="ANML_SPECIES" type="text" id="ANML_SPECIES" value="{{ old('ANML_SPECIES', optional($aNIMALINFO)->ANML_SPECIES) }}" minlength="1" placeholder="{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SPECIES__placeholder') }}">
        {!! $errors->first('ANML_SPECIES', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ANML_SEX') ? 'has-error' : '' }}">
    <label for="ANML_SEX" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SEX') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="ANML_SEX" type="text" id="ANML_SEX" value="{{ old('ANML_SEX', optional($aNIMALINFO)->ANML_SEX) }}" minlength="1" placeholder="{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SEX__placeholder') }}">
        {!! $errors->first('ANML_SEX', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ANML_NUMBER') ? 'has-error' : '' }}">
    <label for="ANML_NUMBER" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_NUMBER') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="ANML_NUMBER" type="number" id="ANML_NUMBER" value="{{ old('ANML_NUMBER', optional($aNIMALINFO)->ANML_NUMBER) }}" placeholder="{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_NUMBER__placeholder') }}">
        {!! $errors->first('ANML_NUMBER', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ANML_USE') ? 'has-error' : '' }}">
    <label for="ANML_USE" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_USE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="ANML_USE" type="text" id="ANML_USE" value="{{ old('ANML_USE', optional($aNIMALINFO)->ANML_USE) }}" minlength="1" placeholder="{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_USE__placeholder') }}">
        {!! $errors->first('ANML_USE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ANIMAL_BREED') ? 'has-error' : '' }}">
    <label for="ANIMAL_BREED" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.ANIMAL_BREED') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="ANIMAL_BREED" type="text" id="ANIMAL_BREED" value="{{ old('ANIMAL_BREED', optional($aNIMALINFO)->ANIMAL_BREED) }}" minlength="1" placeholder="{{ trans('a_n_i_m_a_l__i_n_f_os.ANIMAL_BREED__placeholder') }}">
        {!! $errors->first('ANIMAL_BREED', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
    <label for="client_id" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.client_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="client_id" name="client_id">
        	    <option value="" style="display: none;" {{ old('client_id', optional($aNIMALINFO)->client_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('a_n_i_m_a_l__i_n_f_os.client_id__placeholder') }}</option>
        	@foreach ($clients as $key => $client)
			    <option value="{{ $key }}" {{ old('client_id', optional($aNIMALINFO)->client_id) == $key ? 'selected' : '' }}>
			    	{{ $client }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('client_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

