@props(['apps'])

<x-subheader.breadcrumb text="Apps List">
    <x-subheader.breadcrumb-item href="{{ route('dashboard') }}" text="Dashboard" />
    <x-subheader.breadcrumb-item href="{{ route('apps.index') }}" text="Apps" />
</x-subheader.breadcrumb>

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Dashboard-->
        <x-page.app.table-app :apps="$apps" />
        <!--end::Dashboard-->
    </div>
</div>