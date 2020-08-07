<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials.header')
  </head>
    <body id="app-layout">
        @include('partials.navbar')
        <div class="container">
          <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
              <div class="panel-heading"><h1>Welcome to the Dream Land of Laravel  </h1></div>
                <div class="panel-body">
                  <div class="row">
                      <div class="block-stripe"></div>
                  </div>

                  @include('partials.message')
                       
                  @yield('content')

                </div>
                 
                @include('partials.footer')      
                  
            </div>
        </div>
      </div>
      @include('partials.javascript')

      @yield('scripts')

    </body>
</html>