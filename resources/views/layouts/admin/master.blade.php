<!DOCTYPE html>
    <html lang="en">
 
      <head>
        @include('layouts.admin._meta')
        @include('layouts.admin._style')
      </head>
 
      <body id="page-top">
        <div id="wrapper">
          @switch(Auth::user()->role->name)
        
          @case('Admin')
              @include('layouts.admin._sidebar.Adminsidebar')
          @break
        
          @case('Editor')
              @include('layouts.admin._sidebar.Editorsidebar')
          @break

          @case('Publisher')
              @include('layouts.admin._sidebar.Publishersidebar')
          @break

          @case('Writer')
              @include('layouts.admin._sidebar.Writersidebar')
          @break
            
          @endswitch
     
            <div id="content-wrapper" class="d-flex flex-column">
              <div id="content">
                @include('layouts.admin._header')
                <div class="container-fluid">
                  @yield('header')
                  @yield('content')
                  @yield('sidebar')
                </div>
              </div>
            @include('layouts.admin._footer')
            </div>
        </div>
   @include('layouts.admin._script')
   @yield('js')
  </body>
</html>