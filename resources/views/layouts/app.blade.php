<html>
  <head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      @yield('content')
    </div>
  </body>
</html>
