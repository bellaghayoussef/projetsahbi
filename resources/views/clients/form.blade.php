
<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
    <label for="first_name" class="col-md-2 control-label">{{ trans('clients.first_name') }}</label>
    <div class="col-md-10">
        <input required class="form-control" name="first_name" type="text" id="first_name" value="{{ old('first_name', optional($client)->first_name) }}" minlength="1" placeholder="{{ trans('clients.first_name__placeholder') }}">
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
    <label for="last_name" class="col-md-2 control-label">{{ trans('clients.last_name') }}</label>
    <div class="col-md-10">
        <input required class="form-control" name="last_name" type="text" id="last_name" value="{{ old('last_name', optional($client)->last_name) }}" minlength="1" placeholder="{{ trans('clients.last_name__placeholder') }}">
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} ">
    <label for="phone" class="col-md-2 control-label">{{ trans('clients.phone') }}</label>
    <div class="row">
    <div class="col-md-8">
        <input required class="form-control" name="phone" type="number" id="phone" value="{{ old('phone', optional($client)->phone) }}" minlength="1" placeholder="{{ trans('clients.phone__placeholder') }}">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-4">
        <select class="form-control select-css " id="contry_id" name="contry_id">
        	    <option value="" style="display: none;" {{ old('contry_id', optional($client)->contry_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('clients.contry_id__placeholder') }}</option>
        	@foreach ($contries as $key => $contry)
			    <option value="{{ $key }}" {{ old('contry_id', optional($client)->contry_id) == $key ? 'selected' : '' }}>
			    	{{ $contry }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('contry_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">{{ trans('clients.email') }}</label>
    <div class="col-md-10">
        <input required class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($client)->email) }}" placeholder="{{ trans('clients.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ud') ? 'has-error' : '' }}">
    <label for="ud" class="col-md-2 control-label">{{ trans('clients.ud') }}</label>
    <div class="col-md-10">
        <input required class="form-control" name="ud" type="text" id="ud" value="{{ old('ud', optional($client)->ud) }}" minlength="1" placeholder="{{ trans('clients.ud__placeholder') }}">
        {!! $errors->first('ud', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo_ud_frent') ? 'has-error' : '' }}">
    <label for="photo_ud_frent" class="col-md-2 control-label">{{ trans('clients.photo_ud_frent') }}</label>
    <div class="col-md-10">
        <input required class="form-control" name="photo_ud_frent" type="file" id="photo_ud_frent" value="{{ old('photo_ud_frent', optional($client)->photo_ud_frent) }}" minlength="1" placeholder="{{ trans('clients.photo_ud_frent__placeholder') }}">
        {!! $errors->first('photo_ud_frent', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo_ud_back') ? 'has-error' : '' }}">
    <label for="photo_ud_back" class="col-md-2 control-label">{{ trans('clients.photo_ud_back') }}</label>
    <div class="col-md-10">
        <input required class="form-control" name="photo_ud_back" type="file" id="photo_ud_back" value="{{ old('photo_ud_back', optional($client)->photo_ud_back) }}" minlength="1" placeholder="{{ trans('clients.photo_ud_back__placeholder') }}">
        {!! $errors->first('photo_ud_back', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">{{ trans('clients.password') }}</label>
    <div class="col-md-10">
        <input required class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($client)->password) }}" placeholder="{{ trans('clients.password__placeholder') }}">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group ">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>
</div>

{{-- <div class="form-group {{ $errors->has('accepted') ? 'has-error' : '' }}">
    <label for="accepted" class="col-md-2 control-label">{{ trans('clients.accepted') }}</label>
    <div class="col-md-10">
        <input required class="form-control" name="accepted" type="text" id="accepted" value="{{ old('accepted', optional($client)->accepted) }}" minlength="1" placeholder="{{ trans('clients.accepted__placeholder') }}">
        {!! $errors->first('accepted', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('refused') ? 'has-error' : '' }}">
    <label for="refused" class="col-md-2 control-label">{{ trans('clients.refused') }}</label>
    <div class="col-md-10">
        <input required class="form-control" name="refused" type="text" id="refused" value="{{ old('refused', optional($client)->refused) }}" minlength="1" placeholder="{{ trans('clients.refused__placeholder') }}">
        {!! $errors->first('refused', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

