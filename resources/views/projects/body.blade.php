<!DOCTYPE html>
<html lang="en">

    <head>
        @include('projects.header')
    </head>

    <body id="bg">
        <div class="page-wraper">
        
            <div id="loading-icon-bx"></div>
            
            @include('projects.headertop')
    
            <div class="page-content bg-white">
                <section>
                    @yield('content')
                </section> 
            </div>
    
            @include('projects.footer')
            
            <button class="back-to-top fa fa-chevron-up" ></button>
            
        </div>

        @include('projects.script')
    </body>
</html>