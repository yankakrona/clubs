@extends('frontend.layouts.master')
@section('title','求人情報')
@section('content')
<div class="ktv-list">
  <div class="row">
    <div class="ktv-menu-list col-md-12 col-sm-12 col-xs-12">
      <div class="col-ktv-privecy">
          <h1>女性キャスト求人情報</h1>
          <div class="col-privecy-des">
            <p>大盛況につき、新しいキャストさんを募集中です♪</p>
            <p>時給は完全永久保証なので安心して働けますよ♪</p>
            <p>体験入店キャンペーン好評継続中！</p>
            <p>全額日払いで何度でもOK！20代前半～30代前半の学生・Wワーク・主婦が活躍中！短期も大歓迎です！</p>
            <ul>
              <li>■時給	6000円～</li>
              <li>■勤務時間	20:00 ～ LAST</li>
              <li>■勤務地	北松戸</li>
              <li>■年齢・資格	20歳～</li>
              <li>■応募条件	週2日から</li>
              <li>■待遇</li>
            </ul>
            <p>体入あり、 日払いOK、 寮あり、 未経験者歓迎、 経験者優遇、 衣装レンタル無料、 シフト自己申告、 ３H以内勤務OK、 退勤後 送りあり、 ノルマなし、 飲めなくてもOK、 友人同士歓迎、 ◎ノルマ・強制など一切なし ◎体験入店全額日払い ◎高額歩合あり ◎ヘアメイク完備 ◎個人ロッカー・更衣室完備 ◎新作ドレス・ポーチ・ミュール無料レンタル</p>
            <ul>
              <li>■応募方法	お電話にてご確認ください</li>
              <li>■お問い合わせ</li>
              <li>047-364-7131</li>
              <li>080-8716-6365</li>
              <li>08087166365@docomo.ne.jp</li>
            </ul>
          </div>
      </div><!--/col-ktv-privecy-->
    </div><!--/ktv-menu-list-->
  </div><!--row-->
  <!-- start main menu -->
  @include('pages.inc.main-menu')
  <!-- end main menu -->
</div><!--/ktv-list-->
@endsection
