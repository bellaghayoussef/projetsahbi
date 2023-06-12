
<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
    <label for="first_name" class="col-md-2 control-label">{{ trans('users.first_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="first_name" type="text" id="first_name" value="{{ old('first_name', optional($users)->first_name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.first_name__placeholder') }}">
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
    <label for="last_name" class="col-md-2 control-label">{{ trans('users.last_name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="last_name" type="text" id="last_name" value="{{ old('last_name', optional($users)->last_name) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.last_name__placeholder') }}">
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ud') ? 'has-error' : '' }}">
    <label for="ud" class="col-md-2 control-label">{{ trans('users.ud') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="ud" type="text" id="ud" value="{{ old('ud', optional($users)->ud) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.ud__placeholder') }}">
        {!! $errors->first('ud', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">{{ trans('users.email') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($users)->email) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">{{ trans('users.password') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="password" type="text" id="password" value="{{ old('password', optional($users)->password) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('users.password__placeholder') }}">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

