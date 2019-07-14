<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>
      @yield('title',' Laravel Ecommerce Site.')
    </title>
    @include('FrontEnd.partials.styles')
  </head>
  <body>
    <div class="wrapper ">
      @include('FrontEnd.partials.nav')
      @include('FrontEnd.partials.message')

        <!-- navbar end  -->

        @yield('content')

          @include('FrontEnd.partials.footer')
    </div>


    @include('FrontEnd.partials.scripts')
    @yield('scripts')
  </body>
</html>
