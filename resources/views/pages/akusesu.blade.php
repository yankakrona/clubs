@extends('frontend.layouts.master')
@section('title','アクセス')
@section('content')
<div class="ktv-list">
  <div class="row">
    <div class="ktv-menu-list col-md-12 col-sm-12 col-xs-12">
        <div class="col-map-contact">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15636.166146242478!2d104.92136435!3d11.548878199999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095129560c3acd%3A0x7bb476c7fb1f0dd2!2sAEON+MALL+Phnom+Penh!5e0!3m2!1sen!2skh!4v1510632463948" width="1050" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="col-map-contact">
          <div id="col-responsive" class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>■住所・アクセス</th>
                  <th>■電話番号</th>
                  <th>■営業時間</th>
                  <th>■定休日</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><div class="text-data">千葉県松戸市XXXXXXXXX</div></td>
                  <td><div class="text-data">XXXX-XXXX-XXXX</div></td>
                  <td><div class="text-data">XX:XX～LAST</div></td>
                  <td><div class="text-data">年中無休</div></td>
                </tr>
                <tr>
                  <td><div class="text-data">北松戸駅より徒歩1分</div></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table><!--/table table-striped-->
          </div><!--/table-responsive-->
        </div><!--/col-map-contact-->
    </div><!--/ktv-menu-list-->
  </div><!--/row-->
  <!-- start main menu -->
  @include('pages.inc.main-menu')
  <!-- end main menu -->
</div><!--/ktv-list-->
@endsection
