<x-app-layout>

    <x-slot name="scroll">true</x-slot>

    <x-slot name="page_vendor_style"></x-slot>

    <x-slot name="page_vendor_script">
        <!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('js/pages/widgets.js') }}"></script>
		<script src="{{ asset('js/pages/custom/profile/profile.js') }}"></script>
		<!--end::Page Scripts-->
    </x-slot>

    <x-subheader.breadcrumb text="Profile">
        <x-subheader.breadcrumb-item href="{{ url('/') }}" text="Dashboard" />
        <x-subheader.breadcrumb-item href="{{ url('/profile') }}" text="Profile" />
    </x-subheader.breadcrumb>

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Profile-->
            <div class="d-flex flex-row">
                <x-sidebar.profile-aside />
            </div>
        </div>
    </div>

</x-app-layout>