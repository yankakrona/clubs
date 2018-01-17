@extends('backend.layouts.master')
@section('title','Create album for girl staff')
@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
  <!-- start Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/"><i class="fa fa-fw fa-home"></i></a>
      </li>
      <li class="breadcrumb-item active">Add Album</li>
    </ol>
   <!-- end Breadcrumbs-->
   <!--start form add new -->
   <div class="widget widget-default">
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-fw fa-female"></i>Add Ablum
        </div>
        <form id="girls_album" role="form" class="form-horizontal" method="POST" action="{{route('backend.album.store')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                @if(session('global'))
                  <div class="msg-error text-center">
                    <div class="show-error"><h4><i class="fa fa-exclamation-circle"></i>{{session('global')}}</h4></div>
                  </div>
                @endif
                <div class="form-group">
                  <div class="label-form col-md-3 col-sm-3">Name:</div>
                  <div class="col-md-4 col-sm-4">
                    @if ($errors->has('girl_lists'))
                      <div class="msg-error">
                        <div class="show-error"><i class="fa fa-exclamation-circle"></i>{{ $errors->first('girl_lists') }}</div>
                      </div>
                    @endif
                    <select class="form-control{{ $errors->has('girl_lists') ? ' has-error' : '' }}" name="girl_lists" id="girl_lists" title="list's name girl">
                      @foreach($list_arr as $id => $name)
                        <option value="{{$id}}">{{$name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div><!--/form-group-->
                <div class="form-group">
                  <div class="label-form col-md-3 col-sm-3">Album Girl:</div>
                  <div class="col-md-9 col-sm-9">
                      @if ($errors->has('photos'))
                        <div class="msg-error">
                          <div class="show-error"><i class="fa fa-exclamation-circle"></i>{{ $errors->first('photos') }}</div>
                        </div>
                      @endif
                      <!--/show file upload ulbum-->
                      <div id="albume-img"></div>
                      <!-- display gallery image-->
                      <div class="display_album">
                        <div class="count_image">0</div>
                        <div id="stage-gallery" style="max-height:450px; overflow-y:scroll"></div>
                      </div>
                  </div>
                </div><!--/form-group--->
              </div><!--/col-md-6-->
              <div class="col-md-12 col-sm-12">
                <div class="btn-md-2">
                  <input type="submit" class="btn btn-primary btn-block btn-submit" value="Save">
                </div>
              </div><!--/col-md-12-->
            </div><!--row-->
          </div><!--/panel-body-->
        </form><!--/form-->
      </div><!--widget-->
      <!--end form add new -->
    </div><!--/widget-->
  </div><!--/col-md-12-->
</div><!--/row-->
<!--script upload albumfile images-->
<script src="/assets/js/albumFileUpload.js"></script>
  <script>
    $(document).ready(function(){
        var options = {
          'name':'photos[]',
          'previews':'stage-gallery',
          'counter':'count_image',
          'columnClass':'col-md-2 col-sm-2 col-xs-4 text-center',
          'allowedFiles':['gif','png','jpg','jpeg','xlsx'],
          'allowedPreviews':['jpg','jpeg']
        };
        $("#albume-img").albumFileUpload(options);
    });
  </script>
@endsection
