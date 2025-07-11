<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Tagihan Telkom Kendari</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    {{-- <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon"> --}}
</head>

<body>
    <div id="app">
        {{-- sidebar --}}
        @include('templates.sidebar')
        {{-- end sidebar --}}
        <div id="main">
            {{-- Top Navbar --}}
            @include('templates.navbar')
            {{-- End Top Navbar --}}
            
            <div class="page-heading">
                <h3>@yield('page_title')</h3>
            </div>
            {{-- content --}}
            @yield('content')
            {{-- end content --}}
            
        </div>
    </div>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        window.Laravel = {
            appUrl: "{{ config('app.url') }}"
        };
    </script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    
    {{-- Feather Icons --}}
</body>

</html>