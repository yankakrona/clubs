@extends('frontend.layouts.master')
@section('title','料金システム')
@section('content')
<div class="ktv-list">
  <div class="row">
    <div class="ktv-menu-list col-md-12 col-sm-12 col-xs-12">
      <div class="col-company-profile">
        <div id="list-data">
          <table class="table">
            <tbody>
              <tr>
                <th><div class="text-title">■セット料金	（通常）</div></th>
                <td><div class="text-data">ALL TIME￥3000／60min</div></td>
              </tr>
              <tr>
                <th><div class="text-title">■同伴パック</div></th>
                <td>
                  <div class="text-data">20:00～21:59ご入店</div>
                  <div class="text-data">→￥18000／2時間</div>
                  <div class="text-data text-margin-15">22:00～ ご入店</div>
                  <div class="text-data">→￥20000／2時間</div>
                </td>
              </tr>
              <tr>
                <th><div class="text-title">■延長料金</div></th>
                <td><div class="text-data">60分 ¥3000（延長確認あり）</div></td>
              </tr>
              <tr>
                <th><div class="text-title">■指名料</div></td>
                <td><div class="text-data">¥2000</div></td>
              </tr>
              <tr>
                <th><div class="text-title">■税金・サービス料</div></td>
                <td><div class="text-data">T.C. 10％</div></td>
              </tr>
              <tr>
                <th><div class="text-title">■利用可能カード</div></td>
                <td><div class="text-data">VISA/JCB/AMEX/Master/ダイナース</div></td>
              </tr>
              <tr>
                <th><div class="text-title">■目安予算</div></td>
                <td><div class="text-data">￥3,000～￥7,000</div></td>
              </tr>
              </tbody>
          </table><!--/table table-striped-->
        </div><!--/table-responsive-->
      </div><!--/col-company-profile-->
    </div><!--/ktv-menu-list-->
  </div><!--/row-->
  <!-- start main menu -->
  @include('pages.inc.main-menu')
  <!-- end main menu -->
</div><!--/ktv-list-->
@endsection
