<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;

    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{

    width: auto;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
select,input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
#container {width:100%; font-size: 0;}
#left, #middle, #right {display: inline-block; *display: inline; zoom: 1; vertical-align: top; font-size: 12px;padding: 5px;}
#left {width: 40%; }
#middle {width: 50%; }
#right {width: 100%;}
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    @php
    $countries =   App\Models\countries::where('active',1)->get();

  @endphp
    <form   method="POST" action="{{ route('clients.client.updatem', $client->id) }}" id="edit_client_form" name="edit_client_form" accept-charset="UTF-8" class="form-horizontal">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">


        <div id="container">








        <div id="left" class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
            <label for="first_name" class="col-md-2 control-label">{{ trans('clients.first_name') }}</label>
            <div class="col-md-10">
                <input required class="form-control" name="first_name" type="text" id="first_name" value="{{ $client->first_name }}" minlength="1" placeholder="{{ trans('clients.first_name__placeholder') }}">
                {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div id="left" class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
            <label for="last_name" class="col-md-2 control-label">{{ trans('clients.last_name') }}</label>
            <div class="col-md-10">
                <input required class="form-control" name="last_name" type="text" id="last_name" value="{{ $client->last_name }}" minlength="1" placeholder="{{ trans('clients.last_name__placeholder') }}">
                {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div id="right" class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} ">
            <label for="phone" class="col-md-2 control-label">{{ trans('clients.phone') }}</label>
            <div class="row">

                <div id="left">
                <input required class="form-control" name="phone" type="number" id="phone" value="{{ $client->phone }}" minlength="1" placeholder="{{ trans('clients.phone__placeholder') }}">
                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
            </div>
            <div id="left">
                <select class="form-control select-css " id="contry_id" name="contry_id" required>
                        <option value="" style="display: none;" disabled selected>{{ trans('clients.contry_id__placeholder') }}</option>
                    @foreach ($countries as  $contry)
                        <option value="{{ $contry->id }}" >
                            {{ $contry->phonecode }}+
                        </option>
                    @endforeach
                </select>

                {!! $errors->first('contry_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        </div>

        <div id="right" class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email" class="col-md-2 control-label">{{ trans('clients.email') }}</label>
            <div class="col-md-10">
                <input required class="form-control" name="email" type="email" id="email" value="{{ $client->email }}" placeholder="{{ trans('clients.email__placeholder') }}">
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div id="right" class="form-group {{ $errors->has('ud') ? 'has-error' : '' }}">
            <label for="ud" class="col-md-2 control-label">{{ trans('clients.ud') }}</label>
            <div class="col-md-10">
                <input required class="form-control" name="ud" type="number" min="11111111111" max="99999999999" id="ud" value="{{ $client->ud }}" minlength="1" placeholder="{{ trans('clients.ud__placeholder') }}">
                {!! $errors->first('ud', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div id="left" class="form-group {{ $errors->has('photo_ud_frent') ? 'has-error' : '' }}">
            <label for="photo_ud_frent" class="col-md-2 control-label">{{ trans('clients.photo_ud_frent') }}</label>
            <div class="col-md-10">
                <input required class="form-control" name="photo_ud_frentd" type="file" id="photo_ud_frent" value="{{ $client->photo_ud_frent }}" minlength="1" placeholder="{{ trans('clients.photo_ud_frent__placeholder') }}">
                {!! $errors->first('photo_ud_frent', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div id="left" class="form-group {{ $errors->has('photo_ud_back') ? 'has-error' : '' }}">
            <label for="photo_ud_back" class="col-md-2 control-label">{{ trans('clients.photo_ud_back') }}</label>
            <div class="col-md-10">
                <input required class="form-control" name="photo_ud_backd" type="file" id="photo_ud_back" value="{{ $client->photo_ud_back }}" minlength="1" placeholder="{{ trans('clients.photo_ud_back__placeholder') }}">
                {!! $errors->first('photo_ud_back', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div id="left" class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password" class="col-md-2 control-label">{{ trans('clients.password') }}</label>
            <div class="col-md-10">
                <input required class="form-control" name="password" type="password" id="password"  placeholder="{{ trans('clients.password__placeholder') }}">

            </div>
        </div>

        <div id="left" class="form-group ">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('clients.password_confirmation') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <button type="submit">{{ __('login.Login') }}</button>



    </div>
    </form>
</body>
</html>
