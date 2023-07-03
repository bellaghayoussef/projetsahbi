
<div class="form-group {{ $errors->has('Username') ? 'has-error' : '' }}">
    <label for="Username" class="col-md-2 control-label">{{ trans('api_users.Username') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Username" type="text" id="Username" value="{{ old('Username', optional($apiUser)->Username) }}" minlength="1" placeholder="{{ trans('api_users.Username__placeholder') }}">
        {!! $errors->first('Username', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Password') ? 'has-error' : '' }}">
    <label for="Password" class="col-md-2 control-label">{{ trans('api_users.Password') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Password" type="password" id="Password" value="{{ old('Password', optional($apiUser)->Password) }}" placeholder="{{ trans('api_users.Password__placeholder') }}">
        {!! $errors->first('Password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{-- <div class="form-group {{ $errors->has('access_token') ? 'has-error' : '' }}" >
    <label for="access_token" class="col-md-2 control-label">{{ trans('api_users.access_token') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="access_token" type="text" id="access_token" value="{{ old('access_token', optional($apiUser)->access_token) }}" minlength="1" placeholder="{{ trans('api_users.access_token__placeholder') }}">
        {!! $errors->first('access_token', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}
<br><br><br>

