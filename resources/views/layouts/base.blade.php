<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from demo.themesberg.com/volt-pro/pages/dashboard/traffic-sources.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 May 2023 08:02:09 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Gestion de ferme-JoyFarm</title>
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="title" content="Volt Premium Bootstrap Dashboard - Traffic Sources">
  <meta name="author" content="Themesberg">
  <meta name="description"
    content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
  <meta name="keywords"
    content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, themesberg, themesberg dashboard, themesberg admin dashboard">
 
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://demo.themesberg.com/volt-pro">
  <meta property="og:title" content="Volt Premium Bootstrap Dashboard - Traffic Sources">
  <meta property="og:description"
    content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
  <meta property="og:image"
    content="{{ asset('assets/img/brand/rabbit.svg') }}">
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://demo.themesberg.com/volt-pro">
  <meta property="twitter:title" content="Volt Premium Bootstrap Dashboard - Traffic Sources">
  <meta property="twitter:description"
    content="Volt Pro is a Premium Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
  <meta property="twitter:image"
    content="../../../../themesberg.s3.us-east-2.amazonaws.com/public/products/volt-pro-bootstrap-5-dashboard/volt-pro-preview.jpg">
  <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/brand/rabbit.svg') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/brand/rabbit.svg') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/brand/rabbit.svg') }}">
  <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}">
  <link rel="mask-icon" href="{{ asset('assets/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <link type="text/css" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ asset('vendor/notyf/notyf.min.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ asset('vendor/fullcalendar/main.min.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ asset('vendor/apexcharts/apexcharts.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ asset('vendor/dropzone/min/dropzone.min.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ asset('vendor/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ asset('vendor/leaflet/leaflet.css') }}" rel="stylesheet">
  <link type="text/css" href="{{ asset('css/volt.css') }}" rel="stylesheet">
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
  <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-141734189-6"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }
  gtag('js', new Date());

  gtag('config', 'UA-141734189-6');
  </script>
  <script>
    (function (w, d, s, l, i) {
    w[l] = w[l] || []; w[l].push({
      'gtm.start':
        new Date().getTime(), event: 'gtm.js'
    }); var f = d.getElementsByTagName(s)[0],
      j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
        '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl; f.parentNode.insertBefore(j, f);
  })(window, document, 'script', 'dataLayer', 'GTM-THQTXJ7');
  </script>
</head>

<body><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THQTXJ7" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>
  <!-- Begin page -->
    
  @include('sections.header')
  
  @include('sections.left_sidebar')

  <main class="content">
    @include('sections.secondary-header')
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
      <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
          <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
            <li class="breadcrumb-item"><a href="#">Volt</a></li>
            <li class="breadcrumb-item active" aria-current="page">Widgets</li>
          </ol>
        </nav>
        <h2 class="h4">Widgets</h2>
        <p class="mb-0">You can easily show your stats content by using these cards.</p>
      </div>
    </div>
    @yield('content')
    @include('sections.footer')

  </main>
  <div class="loading-area">
    <img src="{{ asset('loading.gif') }}" alt="">
  </div>
  <script src="{{ asset('vendor/popperjs/core/umd/popper.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('vendor/onscreen/on-screen.umd.min.js') }}"></script>
  <script src="{{ asset('vendor/nouislider/distribute/nouislider.min.js') }}"></script>
  <script src="{{ asset('vendor/smooth-scroll/smooth-scroll.polyfills.min.js') }}"></script>
  <script src="{{ asset('vendor/countup.js/countUp.umd.js') }}"></script>
  <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('vendor/vanillajs-datepicker/js/datepicker.min.js') }}"></script>
  <script src="{{ asset('vendor/simple-datatables/umd/simple-datatables.js') }}"></script>
  <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
  <script src="{{ asset('assets/ajax/libs/moment.js/2.27.0/moment.min.js') }}"></script>
  <script src="{{ asset('vendor/vanillajs-datepicker/js/datepicker.min.js') }}"></script>
  <script src="{{ asset('vendor/fullcalendar/main.min.js') }}"></script>
  <script src="{{ asset('vendor/dropzone/min/dropzone.min.js') }}"></script>
  <script src="{{ asset('vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>
  <script src="{{ asset('vendor/notyf/notyf.min.js') }}"></script>
  <script src="{{ asset('vendor/leaflet/leaflet.js') }}"></script>
  <script src="{{ asset('vendor/svg-pan-zoom/svg-pan-zoom.min.js') }}"></script>
  <script src="{{ asset('vendor/svgmap/svgMap.min.js') }}"></script>
  <script src="{{ asset('vendor/simplebar/simplebar.min.js') }}"></script>
  <script src="{{ asset('vendor/sortablejs/Sortable.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="{{ asset('assets/js/volt.js') }}"></script>
  

  <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    
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
<!-- Mirrored from demo.themesberg.com/volt-pro/pages/dashboard/traffic-sources.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 30 May 2023 08:02:09 GMT -->

</html>