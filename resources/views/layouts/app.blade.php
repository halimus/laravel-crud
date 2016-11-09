<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <!-- DataTables -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

        <!-- Scripts -->
        <script>window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?></script>
    </head>
    <body>
        <div id="app">

            @include('layouts.navbar')

            <div class="container">
                <div class="col-md-10 col-md-offset-1">
                    @include('flash::message')
                </div>
            </div>
            
            

            @yield('content')

        </div>

        <!-- Scripts -->
        <script src="/js/app.js"></script>

        <script>
            $('div.alert').not('.alert-important').delay(1500).slideUp(300);
            $('#flash-overlay-modal').modal();
        </script>
        
        
        @stack('scripts')

    </body>
</html>
