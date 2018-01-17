@extends('backend.layouts.masterLogin')
@section('title','Login')
@section('content')
<div id="body_content">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 co-lefe-12">
      <div class="login-form">
        <div class="col-login">
          <div class="login-profile">
            <img src="/assets/img/logo-girl.png">
          </div>
        </div>
        <div class="text-center"><h2>Login</h2></div>
        <!-- Login Form -->
        <form role="form" class="form-horizontal-login" method="POST" action="{{ route('backend.account.login.post') }}">
        {{ csrf_field() }}
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
          @if ($errors->has('email'))
          <div class="col-msg-12">
            <span class="msg-error">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>{{ $errors->first('email') }}
            </span>
          </div>
          @endif
          <div class="input-group">
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}"  placeholder="e-mail" autofocus>
              <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></label>
              </span>
          </div>
        </div><!--form-group-->
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
            @if ($errors->has('password'))
            <div class="col-msg-12">
                <span class="msg-error">
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>{{ $errors->first('password') }}
                </span>
            </div>
            @endif
          <div class="input-group">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' has-error' : '' }}" name="password" placeholder="password">
              <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></label>
              </span>
          </div>
        </div><!--form-group-->
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
          <div class="input-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
          </div>
        </div><!--/form-group-->
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </div>
      </form>
        <!-- End of Login Form -->
      </div><!--/form-login-->
    </div><!--/col-md-5-->
  </div><!--/row-->
</div>
@endsection
