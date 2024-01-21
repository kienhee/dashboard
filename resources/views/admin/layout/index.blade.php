<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('server') }}/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>{{getEnv('APP_NAME_ADMIN')}}: @yield('title', getEnv('APP_NAME_ADMIN'))</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('server') }}/img/favicon/favicon.ico" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('server') }}/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('server') }}/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('server') }}/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('server') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('server') }}/vendor/libs/apex-charts/apex-charts.css" />
    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('server') }}/vendor/css/pages/page-auth.css" />
    <link rel="stylesheet" href="{{ asset('server') }}/vendor/css/pages/page-misc.css" />
    <!-- Helpers -->
    <script src="{{ asset('server') }}/vendor/js/helpers.js"></script>
    <script src="{{ asset('server') }}/js/config.js"></script>
    {{-- CDN --}}
    <link href="{{ asset('server') }}/vendor/libs/DataTables/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/el9eht3oqsjlpvjkdu2mx5gh01fq5xie6zt09pq791iqfhej/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

    <link rel="stylesheet" href="{{ asset('server') }}/css/style.css" />
</head>

<body>
    @php
    $checkLayout = $layout ?? 'main';
    @endphp
    @if ($checkLayout == 'main')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            @include('admin.layout.aside')
            <div class="layout-page">
                @include('admin.layout.nav')
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        @yield('content')
                    </div>
                    @include('admin.layout.footer')
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    @elseif($checkLayout == 'auth')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                @yield('content')
            </div>
        </div>
    </div>
    @else
    <div class="container-xxl container-p-y">
        @yield('content')
    </div>
    @endif
    <div class="loading-bg ">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('server') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('server') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('server') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('server') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('server') }}/vendor/js/menu.js"></script>

    <!-- endbuild -->
    <!-- Vendors JS -->
    <script src="{{ asset('server') }}/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="{{ asset('server') }}/vendor/libs/DataTables/datatables.min.js"></script>
    <!-- Main JS -->

    <script src="{{ asset('server') }}/js/generateSlug.js"></script>
    <script src="{{ asset('server') }}/js/initTinymce.js"></script>
    <script src="{{ asset('vendor') }}/laravel-filemanager/js/stand-alone-button.js"></script>
    <!-- Page JS -->
    <script src="{{ asset('server') }}/js/dashboards-analytics.js"></script>
    <script src="{{ asset('server') }}/js/main.js"></script>

    @yield('script')
</body>

</html>