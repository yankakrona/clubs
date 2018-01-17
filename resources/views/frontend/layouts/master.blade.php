<!DOCTYPE html>
<html lang="{{  app()->getLocale()  }}">
  <head>
    @include('frontend.includes.head')
  </head>
  <body>
  <div class="main-content">
    <header id="header">
      <!-- start header -->
      @include('frontend.includes.header')
      <!-- end header -->
    </header><!--/header-->
    @yield('slider')
    <!-- end slider -->
    <!--start container-->
    <section id="content-ktv">
      <div class="container">
        @yield('content')
      </div><!--/container-->
    </section><!--/content-ktv-->
    <!-- end container -->
    <!-- start footer-->
    @include('frontend.includes.footer')
  </body>
</html>
