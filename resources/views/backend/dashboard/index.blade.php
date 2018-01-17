@extends('backend.layouts.master')
@section('title','Dashboard')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <!-- start Breadcrumbs-->
       <ol class="breadcrumb">
         <li class="breadcrumb-item">
           <a href="/"><i class="fa fa-fw fa-home"></i></a>
         </li>
         <li class="breadcrumb-item active">Dashboard</li>
       </ol>
      <!-- end Breadcrumbs-->
    </div><!--/col-md-12-->
    <!-- start display 出勤中 and 一ヶ月以上出勤なし-->
    <div class="col-md-4 col-sm-4 col-xs-12">
      <form id="form-search" action="{{ route('backend.dashboard') }}" method="get">
        {{ csrf_field() }}
        <div class="box-work-3">
          <div class="work_title">出勤中</div>
          <div class="show-work-6">
            <div class="show-num-work">
              @if($work_todays !=null)
                {{count($work_todays)}} 人
              @endif
            </div>
          </div><!--show-work-6-->
          <div class="show-work-6 box-color">
            <label class="icon-work" for="work_flag">
              <input id="work_flag" type="radio" name="work_flag" value="{{ old('work_flag',1) }}" onclick="searchWork(this)" data-flag="1">
              <div class="check-status">
                <div class="show-status status-work"></div>
                <img src="/assets/img/girl.png">
              </div>
            </label>
          </div><!--/show-work-6-->
        </div><!--box-work-3-->
        <div class="box-work-3">
          <div class="work_title">一ヶ月以上出勤なし</div>
          <div class="show-work-6">
            <div class="show-num-work">
              @if($noWork_todays !=null)
                {{count($noWork_todays)}} 人
              @endif
            </div>
          </div><!--show-work-6-->
          <div class="show-work-6 box-color">
            <label class="icon-work" for="nowork_flag">
              <input id="nowork_flag" type="radio" name="work_flag" value="{{ old('work_flag',0) }}" onclick="searchWork(this)" data-flag="0">
              <div class="check-status">
                <div class="show-status status-nowork"></div>
                <img src="/assets/img/girl.png">
              </div>
            </label>
          </div><!--/show-work-6-->
        </div><!--box-work-3-->
      </form><!--/search-->
    </div><!--col-md-3-->
    <!-- start display 出勤中 and 一ヶ月以上出勤なし-->
    <!--start display 今月の出勤数ランキング-->
    <div class="col-md-8 col-sm-8 col-xs-12">
      <div class="tb-rank-9">
        <div class="work_title">出勤中 and 一ヶ月以上出勤なし</div>
        <div class="table-responisve">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>順位</th>
                <th class="text-left">名前</th>
                <th>回数</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rank_works as $key => $rank_work)
              <tr>
                <td>{{  $key+1  }}</td>
                <td class="text-left">{{  $rank_work->girl_name  }}</td>
                <td>{{  $rank_work->total_work  }}</td>
              </tr>
              @endforeach
            </tbody>
          </table><!--/table-->
        </div><!--/table-responsive-->
      </div><!--/tb-rank-9-->
    </div><!--/col-md-9-->
    <!--end display 今月の出勤数ランキング-->
    <!-- start display 出勤中の女の子一覧-->
    <div class="dislay-list-work">
      <div class="col-md-12 col-sm-12">
        <div class="work_title">出勤中の女の子一覧</div>
        <!--start 出勤中-->
        <div id="list-girlWork" class="row-list"></div><!--row-list-->
        <!--end 出勤中-->
      </div><!--/col-md-12-->
    </div><!--dislay-list-work-->
    <!-- end dispay 出勤中の女の子一覧-->
</div><!--/app-->
<script type="text/javascript">
  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }
    });
    if($("input[name=work_flag]").val() ==1){
      $("#work_flag").prop("checked", true);
    }else{
      $("#nowork_flag").prop("checked", true);
    }
    // class list work today
    ListWorkToday();

  });
  // List work today
  function ListWorkToday(){
    var work_flag = 1;
    $.ajax({
       type:'POST',
       url:'{{route('backend.dashboard.search')}}',
       data:{flag:work_flag},
       dataType: 'JSON',
       success:function(data){
         console.log(data);
       }
    }).done(function(data) {
        manageWork(data);
    });
  }
  // search work today
  function searchWork(obj){
    $('input[name="work_flag"]').val($(obj).attr("data-flag"));
    var work_flag = $("input[name=work_flag]").val();
    $.ajax({
       type:'POST',
       url:'{{route('backend.dashboard.search')}}',
       data:{flag:work_flag},
       dataType: 'JSON',
       success:function(data){
         console.log(data);
       }
    }).done(function(data) {
		    manageWork(data);
	  });
  }
  /* Add new Post table row */
  function manageWork(data) {
    var	rows = '';
    $.each( data, function( key, value ) {
      	rows = rows + '<div class="col-work-2">';
      	rows = rows + ' <div class="_2box-work">';
        if(value.profile_girl != ''){
      	rows = rows + '  <img src="/'+value.profile_girl+'" />';
        }else{
        rows = rows + '  <img src="/assets/views/images/noimage.jpg" />';
        }
      	rows = rows + '    <div class="model-title">';
        rows = rows + '       <div class="_2tile">'+value.girl_name+'</div>';
        rows = rows + '       <div class="_2box-status">';
        if(value.work_flag ==1){
        rows = rows + '         <span class="_2icon-status _2work"></span>';
        }else{
        rows = rows + '         <span class="_2icon-status _2noWork"></span>';
        }
        rows = rows + '       </div>';
        rows = rows + '    </div>';
        rows = rows + ' </div><!--/_2box-work-->';
      	rows = rows + '</div><!--/col-work-2-->';
    });
    $("#list-girlWork").html(rows);
  }
</script>
@endsection
