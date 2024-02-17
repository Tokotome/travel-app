<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.partials.excursions.head')
    </head>
    
    <body>
	    @include('layouts.partials.excursions.nav')
        @yield('content')
        @include('layouts.partials.excursions.footer-scripts')
    </body>
</html>