<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ecommerce Site</title>
    @include('partials.styles')
  </head>
  <body>
    <div class="wrapper ">
      @include('partials.nav')

        <!-- navbar end  -->

        @yield('content')

          @include('partials.footer')
    </div>


    @include('partials.scripts')
  </body>
</html>
