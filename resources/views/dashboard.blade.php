<x-app-layout>

    <x-slot name="page_vendor_style">
        <x-theme.page-vendor-style href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" />
    </x-slot>

    <x-slot name="page_vendor_script">
        <!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
		<!--end::Page Vendors-->
        <script>
            window.dynamicTicketData = @json($openTickets ?? []);
            window.dynamicTicketDates = @json($dates ?? []);
        </script>
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('js/pages/widgets.js') }}"></script>
		<script src="{{ asset('js/pages/features/charts/apexcharts.js') }}"></script>
		<!--end::Page Scripts-->
    </x-slot>

    @if (Auth::user()->id == 1 || Auth::user()->id == 2)
        <x-page.dashboard.tech-dashboard :openTicketCount="$openTicketCount" />
    @else
        <x-page.dashboard.user-dashboard />
    @endif

</x-app-layout>