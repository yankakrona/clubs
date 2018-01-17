<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicons-->
    <link rel="shortcut icon" href="/assets/img/favicon.ico">
    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Bootstrap core CSS-->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="/assets/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="/assets/css/admin-login.css" rel="stylesheet">
</head>
<body>
  @if(session('global'))
  <!-- start messaged success-->
    <div class="alert alert-error alert-msg">
        <button type="button" class="close btn-message" data-dismiss="alert" aria-hidden="true">&times;</button>
        <span><i class="fa fa-exclamation-triangle" style="margin-right:5px;font-size:20px;color: #f6f6f6;"></i>{{session('global')}}</span>
    </div>
  @endif
  <!-- end messaged success-->
  <div id="app-clubs">
      <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
              <div class="navbar-header-club">
                  <!-- Branding Image -->
                  <a class="navbar-brand-club" href="{{ url('/') }}">
                      CLUBS
                  </a>
              </div>
          </div>
      </nav>
      <div class="container">
        @yield('content')
      </div>
      <!-- start footer-->
      <footer id="footer-ktv">
        <div class="container">
          <div class="copyright">© 2017 Club S</div>
        </div>
      </footer><!--/footer-->
  </div>
  <!-- Scripts -->
  <script src="/assets/js/jquery.min.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
