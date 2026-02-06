<!DOCTYPE html>
<html lang="en">
    {{-- begin::HEAD --}}
    <head><base href="">
        <meta charset="utf-8" />
		<title>Metronic | Dashboard</title>
		<meta name="description" content="Updates and statistics" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		
        @include('theme.global-theme')
		
        @include('theme.layout-theme')

		<link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" />

        <style>
            body {
                overflow: hidden; /* Sumbu X dan Y mati */
                /* atau */
                overflow-y: hidden; /* Hanya mematikan scroll vertikal */
            }
        </style>
    </head>
    {{-- end::HEAD --}}
    {{-- begin::BODY --}}
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <!--begin::Main-->
		
        <!--begin::Header Mobile-->
        @include('components.header-mobile')
        <!--end::Header Mobile-->

        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="d-flex flex-row flex-column-fluid page">

				@include('components.side-bar')

                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                    @include('components.header')
                    
                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

						@if(Auth::user()->role->id == 1 || Auth::user()->role->id == 2)
							@include('pages.dashboard.tech-dashboard')
						@else
							@include('pages.dashboard.user-dashboard')
						@endif                
                        
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Main-->
        
        @include('components.user-panel')

        @include('theme.global-theme-js')

        <!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('js/pages/widgets.js') }}"></script>
		<!--end::Page Scripts-->

    </body>
</html>