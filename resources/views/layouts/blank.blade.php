<!DOCTYPE html>
<html lang="en">

    <head>
        @include('layouts.meta')

        <!-- <title>Gentellela Alela! | </title> -->
        @yield('title')

        @include('layouts.css')

        @stack('stylesheets')

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                @include('includes/sidebar')

                @include('includes/topbar')

                @yield('main_container')

            </div>
        </div>

        @include('layouts.scripts')

        @include('Alerts::show')

        @stack('scripts')

    </body>
</html>
