@props(['page_vendor_style' => null, 'page_vendor_script' => null, 'scroll' => false])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

        <!-- Styles -->
        {{ $page_vendor_style }}
        
        <x-theme.global-theme />
        <x-theme.layout-theme />

        <link rel="shortcut icon" href="{{ asset('media/logos/logo-icon-light.png') }}" />
        @if ($scroll == false)
            <style>
                body {
                    overflow: hidden; /* Sumbu X dan Y mati */
                    /* atau */
                    overflow-y: hidden; /* Hanya mematikan scroll vertikal */
                }
            </style>
        @else
            <style>
                body {
                    overflow: auto; /* Aktifkan scroll */
                }
            </style>
        @endif
        <script>
            window.GOOGLE_CALENDAR_API_KEY = "{{ config('services.google.api_key') }}";
        </script>
    </head>
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

        <x-header-mobile logo="{{ asset('media/logos/logo-side-light.png') }}" />

        <!--begin::Main-->
        <div class="d-flex flex-column flex-root">
            
            <!--begin::Page-->
            <div class="d-flex flex-row flex-column-fluid page">
                
                <x-side-bar logo="{{ asset('media/logos/logo-side-light.png') }}" />
                
                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    
                    <x-header />

                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                        {{ $slot }}             
                        
                    </div>
                    <!--end::Content-->

                </div>
                <!--end::Wrapper-->

            </div>
            <!--end::Page-->

        </div>
        <!--end::Main-->

        <x-user-panel />

        <x-theme.global-theme-js />

        {{ $page_vendor_script }}

        @stack('scripts')

    </body>
</html>