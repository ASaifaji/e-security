<x-app-layout>

    <x-slot name="scroll">{{ true }}</x-slot>

    <x-slot name="page_vendor_style">
        <link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    </x-slot>

    <x-slot name="page_vendor_script">
        <!--begin::Page Vendors(used by this page)-->
        <script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
        <!--end::Page Vendors-->
        <!--begin::Page Scripts(used by this page)-->
        <script src="{{ asset('js/pages/features/calendar/external-events.js') }}"></script>
        <!--end::Page Scripts-->
    </x-slot>

    <x-page.schedule.schedule :apps="$apps" :users="$users" />

</x-app-layout>