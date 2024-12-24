<!DOCTYPE html>
<html lang="en">
  @include('front.partials.head')
  <body>
    @include('front.partials.nav')
    @yield('content')  
    @include('front.partials.footer')
    @include('front.partials.js')
  </body>
</html>
