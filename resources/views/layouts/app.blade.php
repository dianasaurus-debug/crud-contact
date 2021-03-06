<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Contact Lister</title>
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">
      <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
      <link rel="icon" type="image/x-icon" href="https://iconifier.net/iconified/20200925164622_d920beb65bf3d8aa02df63371f122815/favicon.ico" />
  </head>
  <body>
    @include('inc.navbar')

    <div class="container">
      @if(Request::is('/'))
        @include('inc.showcase')
      @endif
      <div class="row">
        <div class="col-md-8 col-lg-8">
          @include('inc.messages')
          @yield('content')
        </div>
        <div class="col-md-4 col-lg-4">
          @include('inc.sidebar')
        </div>
      </div>
    </div>

    <footer id="footer" class="text-center">
      <p>Copyright 2017 &copy; Diana</p>
    </footer>
  </body>
</html>
