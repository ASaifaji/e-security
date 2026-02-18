@props(['apps'])

<x-subheader.ticket-list />

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Dashboard-->
        <x-page.app.table-app :apps="$apps" />
        <!--end::Dashboard-->
    </div>
</div>