@extends('backend.layouts.master')
@section('title','Create new adminstation account')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  <!-- start Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/"><i class="fa fa-fw fa-home"></i></a>
      </li>
      <li class="breadcrumb-item active">Add New account</li>
    </ol>
   <!-- end Breadcrumbs-->
   <!--start form add new -->
   <div class="widget widget-default">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-fw fa-female"></i>Add New
        </div>
        <form id="form_user" name="form_user" method="POST" action="{{ route('backend.account.create.post') }}" accept-charset="UTF-8">
          {{ csrf_field() }}
          <div class="panel-body">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <div class="label-form col-md-3 col-sm-3">Name:</div>
                  <div class="col-md-9 col-sm-9">
                    @if ($errors->has('name'))
                      <div class="msg-error">
                        <div class="show-error"><i class="fa fa-exclamation-circle"></i>{{ $errors->first('name') }}</div>
                      </div>
                    @endif
                    <input class="form-control{{ $errors->has('name') ? ' has-error' : '' }}" type="text" name="name" value="{{ old('name')  }}" placeholder="name">
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <div class="label-form col-md-3 col-sm-3">E-mail:</div>
                  <div class="col-md-9 col-sm-9">
                    @if ($errors->has('email'))
                      <div class="msg-error">
                        <div class="show-error"><i class="fa fa-exclamation-circle"></i>{{ $errors->first('email') }}</div>
                      </div>
                    @endif
                    <input class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" type="email" name="email" value="{{ old('email')  }}" placeholder="e-mail">
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <div class="label-form col-md-3 col-sm-3">Password:</div>
                  <div class="col-md-9 col-sm-9">
                    @if ($errors->has('password'))
                      <div class="msg-error">
                        <div class="show-error"><i class="fa fa-exclamation-circle"></i>{{ $errors->first('password') }}</div>
                      </div>
                    @endif
                    <input class="form-control{{ $errors->has('password') ? ' has-error' : '' }}" type="password" name="password" placeholder="password">
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <div class="label-form col-md-3 col-sm-3">Verify:</div>
                  <div class="col-md-9 col-sm-9">
                    @if ($errors->has('password_confirmation'))
                      <div class="msg-error">
                        <div class="show-error"><i class="fa fa-exclamation-circle"></i>{{ $errors->first('password_confirmation') }}</div>
                      </div>
                    @endif
                    <input class="form-control{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" type="password" name="password_confirmation" placeholder="verify">
                  </div>
                </div><!--/form-group-->
              </div>
              <div class="form-group">
                <div class="col-md-12 col-sm-12">
                  <div class="btn-md-2">
                    <input type="submit" class="btn btn-primary btn-block btn-submit" value="Save">
                  </div>
                </div><!--/col-md-12-->
              </div><!--/form-group-->
            </div><!--row-->
          </div><!--/panel-body-->
        </form><!--/form-->
      </div><!--widget-->
      <!--end form add new -->
    </div><!--/widget-->
  </div><!--/col-md-12-->
</div><!--/row-->
@endsection
