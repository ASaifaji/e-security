@props(['tickets'])

<x-subheader.breadcrumb text="Ticket List">
    <x-subheader.breadcrumb-item href="{{ route('dashboard') }}" text="Dashboard" />
    <x-subheader.breadcrumb-item href="{{ route('tickets.index') }}" text="Tickets" />
</x-subheader.breadcrumb>

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Dashboard-->
        <x-table-ticket :tickets="$tickets" />
        <!--end::Dashboard-->
    </div>
</div>