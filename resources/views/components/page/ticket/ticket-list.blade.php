@props(['tickets'])

<x-subheader.ticket-list />

<!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <x-table-ticket :tickets="$tickets" />
            <!--end::Dashboard-->
        </div>
    </div>