
<div class="form-group {{ $errors->has('User_id') ? 'has-error' : '' }}">
    <label for="User_id" class="col-md-2 control-label">{{ trans('acceptation_clients.User_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="User_id" name="User_id">
        	    <option value="" style="display: none;" {{ old('User_id', optional($acceptationClient)->User_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('acceptation_clients.User_id__placeholder') }}</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('User_id', optional($acceptationClient)->User_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('User_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Client_id') ? 'has-error' : '' }}">
    <label for="Client_id" class="col-md-2 control-label">{{ trans('acceptation_clients.Client_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="Client_id" name="Client_id">
        	    <option value="" style="display: none;" {{ old('Client_id', optional($acceptationClient)->Client_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('acceptation_clients.Client_id__placeholder') }}</option>
        	@foreach ($clients as $key => $client)
			    <option value="{{ $key }}" {{ old('Client_id', optional($acceptationClient)->Client_id) == $key ? 'selected' : '' }}>
			    	{{ $client }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('Client_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('commenter') ? 'has-error' : '' }}">
    <label for="commenter" class="col-md-2 control-label">{{ trans('acceptation_clients.commenter') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="commenter" type="text" id="commenter" value="{{ old('commenter', optional($acceptationClient)->commenter) }}" minlength="1" placeholder="{{ trans('acceptation_clients.commenter__placeholder') }}">
        {!! $errors->first('commenter', '<p class="help-block">:message</p>') !!}
    </div>
</div>

