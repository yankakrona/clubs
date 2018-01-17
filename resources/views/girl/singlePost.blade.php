@extends('frontend.layouts.master')
@section('title','キャストネーム')
@section('content')

<div class="ktv-title-list"><span class="icon icon-woman"></span>キャストネーム
  @if($girls[0]['girl_name'] !='')
  <span class="model-name">
  {!! str_replace('-', ' ', $girls[0]['girl_name']); !!}
  </span>
  @endif
</div>
<div class="ktv-list">
  <!--start view staff girl-->
  <div class="row">
    <div class="col-md-5 col-sm-5 col-xs-12 col-ktv-12">
      <div class="box-view-model">
        <!-- start slider -->
        <div class="slider-model">
          <div id="modelCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            @if(count($albums) > 0 || count($albums) !='')
            <ol class="carousel-indicators">
              @foreach($albums as $index=>$album)
                @if($index > 0)
                <li data-target="#modelCarousel" data-slide-to="{{$index}}" {{( $index == 0 ) ? 'class="active")':''}}></li>
                @endif
              @endforeach
            </ol>
            @endif
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                @if($girls[0]['profile_girl'] !='')
                  <img src="/{{$girls[0]['profile_girl']}}" alt="{{ $girls[0]['girl_name'] }}">
                @else
                <img src="/assets/views/images/noimage.jpg" alt="image not found">
                @endif
              </div>
              @foreach($albums as $index=>$album)
              <div class="item">
                <img src="/{{$album['photos']}}">
              </div>
              @endforeach
            </div><!--/carousel-inner-->
            <!-- Left and right controls -->
            @if($count_album > 0)
            <div class="text-center">
              <a class="left carousel-control" href="#modelCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#modelCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            @endif
          </div><!--/ktvCarousel-->
        </div>
        <!--/slider-ktv-->
      </div><!--/box-view-model-->
    </div><!--/col-md-5-->
    <div class="col-md-7 col-sm-7 col-xs-12 col-ktv-12">
      <div class="tb-view_model">
        <div class="tr-view_model">
          <div class="td-view_model-left">
            <div class="view-title">年齢<span class="td-dot">:</span></div>
          </div>
          <div class="td-view_model-right">
            <div class="view-detail">{{$girls[0]['age']}}</div>
          </div>
        </div><!--/tr-view_model-->
        <div class="tr-view_model">
          <div class="td-view_model-left">
            <div class="view-title">誕生日<span class="td-dot">:</span></div>
          </div>
          <div class="td-view_model-right">
            <div class="view-detail">{{date("Y年m月d日", strtotime($girls[0]['birthday']))}}</div>
          </div>
        </div><!--/tr-view_model-->
        <div class="tr-view_model">
          <div class="td-view_model-left">
            <div class="view-title">出身地<span class="td-dot">:</span></div>
          </div>
          <div class="td-view_model-right">
            <div class="view-detail">{{$girls[0]['pob']}}</div>
          </div>
        </div><!--/tr-view_model-->
        <div class="tr-view_model">
          <div class="td-view_model-left">
            <div class="view-title">趣味<span class="td-dot">:</span></div>
          </div>
          <div class="td-view_model-right">
            <div class="view-detail">{{$girls[0]['hobby']}}</div>
          </div>
        </div><!--/tr-view_model-->
        <div class="tr-view_model">
          <div class="td-view_model-left">
            <div class="view-title">タバコ<span class="td-dot">:</span></div>
          </div>
          <div class="td-view_model-right">
            @if($girls[0]['cigarette_flag'] == 0)
              <div class="view-detail">吸います</div>
            @elseif($girls[0]['cigarette_flag'] == 1)
              <div class="view-detail">吸いません</div>
            @endif
          </div>
        </div><!--/tr-view_model-->
        <div class="tr-view_model">
          <div class="td-view_model-left">
            <div class="view-title">性格<span class="td-dot">:</span></div>
          </div>
          <div class="td-view_model-right">
            @if($girls[0]['characteristic_type'] == 0)
              <div class="view-detail">S</div>
            @elseif($girls[0]['characteristic_type'] == 1)
              <div class="view-detail">M</div>
            @elseif($girls[0]['characteristic_type'] == 2)
              <div class="view-detail">その他</div>
            @endif
          </div>
        </div><!--/tr-view_model-->
        <div class="tr-view_model">
          <div class="td-view_model-left">
            <div class="view-title">チャームポント<span class="td-dot">:</span></div>
          </div>
          <div class="td-view_model-right">
            <div class="view-detail">{{$girls[0]['chorm_point']}}</div>
          </div>
        </div><!--/tr-view_model-->
      </div>
    </div><!--/col-md-7-->
  </div><!--/row-->
  <!--end view staff girl-->
  <!-- start main menu -->
  @include('pages.inc.main-menu')
  <!-- end main menu -->
</div>
@endsection
