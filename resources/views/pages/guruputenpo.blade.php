@extends('frontend.layouts.master')
@section('title','グループ店舗')
@section('content')
<div class="ktv-list">
  <div class="row">
    <div class="col-ktv-collection col-md-12 col-sm-12 col-xs-12">
        <h1>アットホームクラブ ＫＩＴＴＹ ～キティ～</h1>
        <div class="col-collection-des">
          <p>KITTYの紹介文がここに入ります。KITTYの紹介文がここに入ります。KITTYの紹介文がここに入ります。KITTYの紹介文がここに入ります。KITTYの紹介文がここに入ります。</p>
          <div class="collection-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15636.166146242478!2d104.92136435!3d11.548878199999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095129560c3acd%3A0x7bb476c7fb1f0dd2!2sAEON+MALL+Phnom+Penh!5e0!3m2!1sen!2skh!4v1510632463948" width="1050" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
        </div>
    </div><!--/col-ktv-privecy-->
  </div><!--row-->
  <div class="collection-detail col-border-full">
    <div class="row">
      <div class="col-md-5 col-sm-5 col-xs-6 col-ktv-6">
        <div class="col-collaction-img">
          <img src="/assets/views/images/collection-club1.jpg">
        </div>
        <div class="col-collaction-img">
          <img src="/assets/views/images/collection-club1.jpg">
        </div>
      </div>
      <div class="col-md-5 col-sm-5 col-xs-6 col-ktv-6">
        <div class="col-list-collection">
          <h2>■住所・アクセス</h2>
          <ul>
            <li>千葉県松戸市XXXXXXXXX</li>
            <li>北松戸駅より徒歩1分</li>
          </ul>
        </div><!--/col-list-collection-->
        <div class="col-list-collection">
          <h2>■電話番号</h2>
          <ul>
            <li>XXXX-XXXX-XXXX</li>
          </ul>
        </div><!--/col-list-collection-->
        <div class="col-list-collection">
          <h2>■営業時間</h2>
          <ul>
            <li>XXXX〜LAST</li>
          </ul>
        </div><!--/col-list-collection-->
        <div class="col-list-collection">
          <h2>■定休日</h2>
          <ul>
            <li>年中無休</li>
          </ul>
        </div><!--/col-list-collection-->
      </div>
    </div><!--/row-->
  </div><!--/collection-detail-->
  <div class="row">
    <div class="col-ktv-collection col-md-12 col-sm-12 col-xs-12">
      <h1>たちのみ居酒屋　ひゃく縁</h1>
      <div class="col-collection-des">
        <p>ひゃく縁の紹介文がここに入ります。ひゃく縁の紹介文がここに入ります。ひゃく縁の紹介文がここに入ります。ひゃく縁の紹介文がここに入ります。ひゃく縁の紹介文がここに入ります。</p>
        <div class="collection-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15636.166146242478!2d104.92136435!3d11.548878199999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095129560c3acd%3A0x7bb476c7fb1f0dd2!2sAEON+MALL+Phnom+Penh!5e0!3m2!1sen!2skh!4v1510632463948" width="1050" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>
    </div><!--/col-ktv-privecy-->
    <div class="collection-detail">
      <div class="col-md-5 col-sm-5 col-xs-6 col-ktv-6">
        <div class="col-collaction-img">
          <img src="/assets/views/images/collection-club1.jpg">
        </div>
        <div class="col-collaction-img">
          <img src="/assets/views/images/collection-club1.jpg">
        </div>
      </div>
      <div class="col-md-5 col-sm-5 col-xs-6 col-ktv-6">
        <div class="col-list-collection">
          <h2>■住所・アクセス</h2>
          <ul>
            <li>千葉県松戸市XXXXXXXXX</li>
            <li>北松戸駅より徒歩1分</li>
          </ul>
        </div><!--/col-list-collection-->
        <div class="col-list-collection">
          <h2>■電話番号</h2>
          <ul>
            <li>XXXX-XXXX-XXXX</li>
          </ul>
        </div><!--/col-list-collection-->
        <div class="col-list-collection">
          <h2>■営業時間</h2>
          <ul>
            <li>XXXX〜LAST</li>
          </ul>
        </div><!--/col-list-collection-->
        <div class="col-list-collection">
          <h2>■定休日</h2>
          <ul>
            <li>年中無休</li>
          </ul>
        </div><!--/col-list-collection-->
      </div>
    </div><!--/collection-detail-->
  </div><!--/row-->
  <!-- start main menu -->
  @include('pages.inc.main-menu')
  <!-- end main menu -->
</div><!--/ktv-list-->
@endsection
