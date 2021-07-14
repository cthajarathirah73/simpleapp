<!doctype html>
<html lang="en">

    <head>
        @include('dashboard.header')
    </head>

    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
 
            @include('dashboard.topbar')
    
            <div class="app-main">
                
                @include('dashboard.sidebar')
                
                <div class="app-main__outer">
                    <section>
                        @yield('content')
                    </section>
                </div>
                
            </div>

            @include('dashboard.footer')
            
        </div>

        @include('dashboard.script')
        
    </body>
</html>