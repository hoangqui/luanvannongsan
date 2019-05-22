<!DOCTYPE html>
<html lang="en">
    <head>
        <title> @yield ('title') </title>
        @yield ('metaData')
        
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <link rel="icon" href="{{ url('Frontend/img/logo_title1.png') }}" type="image/gif" sizes="32x32">

        <script>
            var SiteUrl = '{{url("/")}}';
        </script>
        @includeif ('Frontend.Layouts._css_default')
        @includeif ('Frontend.Layouts._css')
        @yield('myCss')
        @includeif ('Frontend.Layouts._angular')
        
        
    </head>
    <body ng-app="ngApp" ng-cloak>
        @includeif ('Frontend.Layouts._menu')

        @includeif ('Frontend.Layouts._header')
    
        @yield('content')
    
        @includeif ('Frontend.Layouts._footer')

        @includeif ('Frontend.Layouts._js_default')
        @includeif ('Frontend.Layouts._js')

        @yield('myJs')
    </body>
</html>
