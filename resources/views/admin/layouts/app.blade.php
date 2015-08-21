<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@section('title') Naveen Auth @show</title>
        @section('meta_keywords')
        <meta name="keywords" content="your, awesome, keywords, here"/>
        @show @section('meta_author')
        <meta name="author" content="Jon Doe"/>
        @show @section('meta_description')
        <meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei."/>
        @yield('styles')
        <link rel="shortcut icon" href="{{{ asset('assets/site/ico/favicon.ico') }}}">
    </head>
    <body>
        @include('partials.nav')
        @include('flash::message')
        <div class="container">
            @yield('content')
        </div>
        @include('partials.footer')
        <!-- Scripts -->
        @yield('scripts')
    </body>
</html>