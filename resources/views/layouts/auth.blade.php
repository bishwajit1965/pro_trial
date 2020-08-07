<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header')
</head>
<body id="app-layout">
    @include('partials.navbar')
   {{--  <div class="container"> --}}
    
         @yield('content')
                  
   {{--  </div> --}}
    @include('partials.javascript')

    @yield('scripts')
</body>
</html>