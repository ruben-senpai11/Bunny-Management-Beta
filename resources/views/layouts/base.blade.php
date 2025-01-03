<!DOCTYPE html>
<html lang="fr" data-bs-theme="dark"> 

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Ma ferme en ligne</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Ma ferme en ligne">
    <meta name="author" content="Bunny Management Corporation">
    <meta name="description" content="Gérez efficacement votre élevage de lapins">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicon/rabbit.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicon/rabbit.svg') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicon/rabbit.svg') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Sweet Alert -->
    <link type="text/css" href="{{ asset('vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- Notyf -->
    <link type="text/css" href="{{ asset('vendor/notyf/notyf.min.css') }}" rel="stylesheet">

    <!-- Volt CSS -->
    <link type="text/css" href="   {{ asset('css/volt.css?v=2') }}" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>            
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.3.0/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" />
    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
    @yield("style")

    @yield("top-script")

    <style>
        .loading-area {
            width: 100vw;
            height: 100%;
            position: fixed;
            top: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999999999;
        }
    </style>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

</head>

<body>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
    @include('sections.header')

    @include('sections.left-sidebar')


    <main class="content">
        @include('sections.secondary-header')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4 d-none">
            <div class="d-block mb-4 mb-md-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                        <li class="breadcrumb-item"><a href="#">Bunny Farm</a></li>
                        <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ \Route::currentRouteName() }}</li>
                    </ol>
                </nav>
                <!-- <h2 class="h4">Widgets</h2>
                <p class="mb-0">You can easily show your stats content by using these cards.</p> -->
            </div>
        </div>
        @yield('content')

        @include('sections.footer')


    </main>
    
    {{-- <div class="loading-area">
        <img src="{{ asset('loading.gif') }}" alt="">
    </div> --}}
    <!-- Core -->
    <script src="{{ asset('vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Vendor JS -->
    <script src="../../vendor/onscreen/dist/on-screen.umd.min.js"></script>

    <!-- Slider -->
    <script src="../../vendor/nouislider/dist/nouislider.min.js"></script>

    <!-- Smooth scroll -->
    <script src="../../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>

    <!-- Charts -->
    <script src="../../vendor/chartist/dist/chartist.min.js"></script>
    <script src="../../vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>

    <!-- Datepicker -->
    <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Sweet Alerts 2 -->
    <script src="../../vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script>

    <!-- Notyf -->
    <script src="../../vendor/notyf/notyf.min.js"></script>

    <!-- Simplebar -->
    <script src="../../vendor/simplebar/dist/simplebar.min.js"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Volt JS -->
    <script src="../../assets/js/volt.js"></script>

    <!--datatales cdn implementation-->
    <script src="{{ asset('vendor/jquery/jquery-3.6.3.js') }}"></script>
    <script src="{{ asset('vendor/datatables/datatable.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/datatables-searchpanes.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/datatables-select.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/datatables-buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendor/datatables/datatables-buttons-html5.js') }}"></script>
    <script src="{{ asset('vendor/datatables/datatables-buttons-print.js') }}"></script>

    <script>
        @if (Session::get('error'))
            Swal.fire({
                position: 'top-end',
                background: 'var(--bs-danger)',
                color: '#fff',
                text: "{{Session::get('error')}}",
                showConfirmButton: false,
                timer: 1500
            })
        @endif


        @if (Session::get('success'))
            Swal.fire({
                position: 'top-end',
                background: 'var(--bs-success)',
                color: '#fff',
                text: "{{Session::get('success')}}",
                showConfirmButton: false,
                timer: 1500
            })
        @endif
      
        $('.loading-area').hide()
    </script>

    @yield("script")
</body>

</html>