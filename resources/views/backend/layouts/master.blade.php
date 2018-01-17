<!DOCTYPE html>
<html lang="{{  app()->getLocale()  }}">
  <head>
    @include('backend.includes.head')
  </head>
  <body>
  <div class="notifications top-right"></div>

  @if (session('flash_message'))
  <!-- start messaged success-->
    <div class="alert alert-success alert-msg">
        <button type="button" class="close btn-message" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span><i class="fa fa-check-circle-o" style="margin-right:5px;font-size:20px;color: #f6f6f6;"></i>{{ session('flash_message') }}</span>
    </div>
  <!-- end messaged success-->
  @endif
  <div class="wrapper">
      <div class="page-wrapper">
        <!--start sidebar menu left-->
          @include('backend.includes.sidebar')
        <!--end sildebar menu left-->
        <!--start header top --->
          @include('backend.includes.header')
        <!--end header top-->
        <!--start content Admin-->
        <div class="content-wrapper">
          <div class="content-dimmer"></div>
          <div class="container-fluid">
            <div id="app">
              @yield('content')
            </div><!--/app-->
          </div><!--/container-fluid-->
          <!--start footer-->
          @include('backend.includes.footer')
          <!--end footer-->
  </body>
</html>
