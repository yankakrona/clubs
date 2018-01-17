@extends('backend.layouts.master')
@section('title','Edit girl information')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  <!-- start Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/"><i class="fa fa-fw fa-home"></i></a>
      </li>
      <li class="breadcrumb-item"><a href="{{ route('backend.girl.index') }}">Girl</a></li>
      <li class="breadcrumb-item active">Edit </li>
    </ol>
   <!-- end Breadcrumbs-->
   <!--start form add new -->
   <div class="widget widget-default">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-fw fa-female"></i>Edit
        </div>
        <form id="girl" name="form_girl" method="POST" action="{{ route('backend.girl.update',$girl->girl_id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('PATCH') }}
          <div class="panel-body">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <div class="label-form col-md-3 col-sm-3">Name:</div>
                  <div class="col-md-9 col-sm-9">
                    @if ($errors->has('girl_name'))
                      <div class="msg-error">
                        <div class="show-error"><i class="fa fa-exclamation-circle"></i>{{ $errors->first('girl_name') }}</div>
                      </div>
                    @endif
                    <input class="form-control{{ $errors->has('girl_name') ? ' has-error' : '' }}" type="text" name="girl_name" value="{{ old('girl_name',$girl->girl_name)  }}" placeholder="name">
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <div class="label-form col-md-3 col-sm-3">Birthday:</div>
                    <div class="group-dob">
                      <div class="box-validate">
                        @if ($errors->has('birthday') || $errors->has('birthday_year') || $errors->has('birthday_month') || $errors->has('birthday_day'))
                          <div class="msg-error">
                            <div class="show-error"><i class="fa fa-exclamation-circle"></i>{{ $errors->first('birthday') }}</div>
                          </div>
                        @endif
                        <input id ="birthday" type="hidden" name="birthday" class="form-control" value="{{ old('birthday',$girl->birthday) }}">
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-4">
                        <select id="birthday_year" class="form-control" name="birthday_year" title="Year">
                          @for($year = date('Y'); $year > date("Y", strtotime("-40 year")); $year--)
                            <option value="{{$year}}" {{ (date('Y',strtotime($girl->birthday)) == $year) ? ' selected' : '' }}>{{ $year }}</option>
                          @endfor
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-4">
                        <select id="birthday_month" class="form-control" name="birthday_month" title="Month">
                          @for($month = 1; $month<= 12; $month++)
                            <option value="{{date('m', mktime(0, 0, 0, $month, 1, 1978))}}" {{ ((date('m',strtotime($girl->birthday)) == date('m', mktime(0, 0, 0, $month, 1, 1978)))) ? ' selected' : '' }}>{{date("M",mktime(0,0,0,$month,1,1978))}}</option>
                          @endfor
                        </select>
                      </div>
                      <div class="col-md-3 col-sm-3 col-xs-4">
                        <select id="birthday_day" class="form-control{{ $errors->has('birthday') ? ' has-error' : '' }}" name="birthday_day"  title="Day">
                          @for($day = 1; $day <= 31; $day++)
                            <option value="{{date("d",mktime(0,0,0,12,$day,1978))}}" {{ (date('d',strtotime($girl->birthday)) == date("d",mktime(0,0,0,12,$day,1978))) ? ' selected' : '' }}>{{date("d",mktime(0,0,0,12,$day,1978))}}</option>
                          @endfor
                        </select>
                      </div>
                  </div><!--/group-dob-->
                </div><!--/form-group-->
                <div class="form-group">
                  <div class="label-form col-md-3 col-sm-3">Place of Birth:</div>
                  <div class="col-md-9 col-sm-9">
                    @if ($errors->has('pob'))
                      <div class="msg-error">
                        <div class="show-error"><i class="fa fa-exclamation-circle"></i>{{ $errors->first('pob') }}</div>
                      </div>
                    @endif
                    <textarea id="pob" name="pob" class="form-control{{ $errors->has('pob') ? ' has-error' : '' }}" rows="4">{{ $girl->pob }}</textarea>
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <div class="label-form col-md-3 col-sm-3">Hobby:</div>
                  <div class="col-md-9 col-sm-9">
                    <textarea id="hobby" name="hobby" class="form-control" rows="4">{{ $girl->hobby }}</textarea>
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <div class="label-form col-md-3 col-sm-3">Cigarette:</div>
                  <div class="col-md-9 col-sm-9">
                    @if ($errors->has('cigarette_flag'))
                      <div class="msg-error">
                        <div class="show-error"><i class="fa fa-exclamation-circle"></i>{{ $errors->first('cigarette_flag') }}</div>
                      </div>
                    @endif
                    <label class="radio-inline">
                        <input type="radio" name="cigarette_flag" id="cigaretee_flag_yes" value="0" {{ ( $girl->cigarette_flag == 0) ? ' checked' : '' }}> Yes
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="cigarette_flag" id="cigaretee_flag_no" value="1" {{ ( $girl->cigarette_flag == 1) ? ' checked' : '' }}> No
                    </label>
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <div class="label-form col-md-3 col-sm-3">Characteristic:</div>
                  @if ($errors->has('characteristic_type'))
                    <div class="msg-error">
                      <div class="show-error"><i class="fa fa-exclamation-circle"></i>{{ $errors->first('characteristic_type') }}</div>
                    </div>
                  @endif
                  <div class="col-md-9 col-sm-9">
                    <label class="radio-inline">
                        <input type="radio" name="characteristic_type" id="characteristic_type_m" value="0" {{ ( $girl->characteristic_type == 0) ? ' checked' : '' }}> M
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="characteristic_type" id="characteristic_type_s" value="1" {{ ( $girl->characteristic_type == 1) ? ' checked' : '' }}> S
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="characteristic_type" id="characteristic_type_other" value="2" {{ ( $girl->characteristic_type == 2) ? ' checked' : '' }}> Other
                    </label>
                  </div>
                </div><!--/form-group-->
              </div><!--/col-md-6-->
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <div class="label-form col-md-3 col-sm-3">Chorm Point:</div>
                  <div class="col-md-9 col-sm-9">
                    <textarea id="chorm_point" name="chorm_point" class="form-control" rows="4">{{ $girl->chorm_point }}</textarea>
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <div class="label-form col-md-3 col-sm-3">Profile Girl:</div>
                  <div class="col-md-9 col-sm-9">
                    @if ($errors->has('profile_girl'))
                      <div class="msg-error">
                        <div class="show-error"><i class="fa fa-exclamation-circle"></i>{{ $errors->first('profile_girl') }}</div>
                      </div>
                    @endif
                    <div class="upload-profile img-upload">
                        <div class="img-file-tab">
                            <div>
                                <span class="btn btn-file img-select-btn btn-block">
                                    <i class="fa fa-fw fa-upload"></i> <span>Upload Profile</span>
                                    <input type="file" name="profile_girl">
                                </span>
                            </div>
                            <span class="btn img-remove-btn"><i class="fa fa-fw fa-times"></i> Remove</span>
                            @if($girl->profile_girl !='')
                              <img id="profile_girl" src="/{{  $girl->profile_girl }}" alt="Image preview" class="img-thumbnail">
                            @endif
                        </div>
                    </div>
                  </div>
                </div><!--/form-group--->
              </div><!--/col-md-6-->
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
<!--script upload file-->
<script src="/assets/js/imageupload.js"></script>
<script type="text/javascript">
  // script for upload image
  $('.img-upload').imgUpload();
  // function select value
  function getSeleted()
  {
    // selected year month and Day
    var year  = $("select#birthday_year").val();
    var month = $("select#birthday_month").val();
    var day   = $("select#birthday_day").val();
    var date = month +'-'+ day +'-'+ year;;
    $("#birthday").val(date);
  }
  // script unseleted
  $(document).ready(function()
  {
    //default value selected
    getSeleted();
    // get value form selected after selected
    $('select#birthday_year,select#birthday_month,select#birthday_day').on('change', function()
    {
      getSeleted();
    });
  });
</script>
@endsection
