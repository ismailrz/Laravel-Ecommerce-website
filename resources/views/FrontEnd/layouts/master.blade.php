<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ecommerce Site</title>
    @include('FrontEnd.partials.styles')
  </head>
  <body>
    <div class="wrapper ">
      @include('FrontEnd.partials.nav')

        <!-- navbar end  -->

        @yield('content')

          @include('FrontEnd.partials.footer')
    </div>


    @include('FrontEnd.partials.scripts')
  </body>
</html>
