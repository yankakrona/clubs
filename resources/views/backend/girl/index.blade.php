@extends('backend.layouts.master')
@section('title','List girl information')
@section('content')
<div class="row">
  <div class="col-md-6 col-sm-6 col-xs-12">
  <!-- start Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/"><i class="fa fa-fw fa-home"></i></a>
      </li>
      <li class="breadcrumb-item active">List's Girls</li>
    </ol>
    <!-- end Breadcrumbs-->
    <!--start form add new -->
  </div><!--/col-md-6-->
  <div class="col-md-6 col-sm-6 col-xs-12">
    <div class="pull-right">
      <form method="GET" action="{{route('backend.girl.index')}}" accept-charset="UTF-8" class="form-inline" _lpchecked="1">
        <div class="form-group">
          <input class="form-control form-search" placeholder="search..." name="search" type="text">
          <button type="submit" class="btn btn-none btn-success"><i class="fa fa-search"></i></button>
        </div>
      </form>
    </div><!--pull-right-->
  </div><!--/col-md-6-->
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="widget widget-default">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span><i class="fa fa-fw fa-female"></i>List's Girls</span>
          <span class="status-search">
            <label class="icon-work-search" for="nowork_flag">
              <input id="nowork_flag" type="radio" name="work_flag" value="0">
              <span class="inline-status search-icon-nowork"></span><span class="name_status">Not Working</span>
            </label>
            <label class="icon-work-search" for="work_flag">
              <input id="work_flag" type="radio" name="work_flag" value="1">
              <span class="inline-status search-icon-work"></span><span class="name_status">Working</span>
            </label>
          </span>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table id="list_girl" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Birthday</th>
                  <th>Age</th>
                  <th>POB</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @php $index = 0; @endphp
                @foreach($girls as $girl)
                @php $index++; @endphp
                <tr>
                  <td>{{$index}}</td>
                  <td><i class="fa fa-right fa-female"></i>{{ $girl->girl_name }}</td>
                  <td>{{ $girl->birthday }}</td>
                  <td>{{ $girl->age }}</td>
                  <td>{{ $girl->pob }}</td>
                  <td class="text-center">
                    @if($girl->work_flag == 0)
                      <div class="icon_flag nowork-active"></div>
                    @elseif($girl->work_flag == 1)
                      <div class="icon_flag work-active"></div>
                    @endif
                  </td>
                  <td class="text-center">
                    <div class="action">
                      <a href="{{route('girl.singlePost',$girl->girl_name)}}" class="btn btn-view btn-xs" title="view" target="_blank"><i class="fa fa-eye"></i> 確認 </a>
                      <a href="{{route('backend.girl.edit',$girl->girl_id)}}" class="btn btn-edit btn-xs" title="Edit"><i class="fa fa-pencil-square-o"></i> 編集 </a>
                      <a id="btn-deleted" onclick="deletePopup(this)" data-id="{{ $girl->girl_id }}" data-name="{{ $girl->girl_name }}" data-popup="#data-delete" href="javascript:void(0)" class="btn btn-delete btn-xs" title="delete"><i class="fa fa-btn fa-trash"></i> 削除 </a>
                    </div><!--/action-->
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table><!--/table-->
            <div class="nav-paginate text-center">
              {!! $girls->links() !!}
            </div><!--/nav-paginate-->
          </div>
        </div><!--/panel-body-->
      </div><!--panel-->
    </div><!--/widget-->
  </div>
</div><!--/row-->
<!-- Modal -->
<div id="data-delete" class="modal">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">削除確認</h4>
      </div>
      <div class="modal-body text-center">
        <div class="icon-msg"><i class="fa fa-exclamation-circle"></i></div>
        <p id="modal-body-msg"></p>
        <p>よろしいでしょうか？</p>
      </div>
      <div class="modal-footer">
        <form id="form-delete" action="{{ route('backend.girl.deleted') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="girl_id" value="">
            <div class="btn-center text-center">
              <button type="button" class="btn btn-default btn-width" onclick="clearPopup(this)" data-clear="#close">いいえ</button>
              <button type="submit" class="btn btn-default btn-width">はい</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="cavas-bg"></div>
<script type="text/javascript">
  function deletePopup(obj){
    console.log($(obj).attr("data-popup"));
    $('input[name="girl_id"]').val($(obj).attr("data-id"));
    $('body').addClass('popup-delete');
    $('.modal').addClass('fade-in');
  }
  function clearPopup(obj){
    console.log($(obj).attr("data-clear"));
    $('body').removeClass('popup-delete');
    $('.modal').removeClass('fade-in');
    $('input[name="girl_id"]').val('');
  }
</script>
@endsection
