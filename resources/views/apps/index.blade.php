<x-app-layout>

    <x-slot name="page_vendor_style">
        <x-theme.page-vendor-style href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" />
    </x-slot>

    <x-slot name="page_vendor_script">
        <!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('js/pages/crud/datatables/basic/headers.js') }}"></script>
		<!--end::Page Scripts-->
    </x-slot>

    <x-page.app.app-list :apps="$apps" />

</x-app-layout>