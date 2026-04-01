@props(['openTicketCount', 'totalChatsThisWeek', 'activities'])

<x-subheader.breadcrumb text="Dashboard">
    <x-subheader.breadcrumb-item href="{{ route('dashboard') }}" text="Dashboard" />
</x-subheader.breadcrumb>

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Dashboard-->
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-6 col-xxl-4">
                <x-widgets.mixed-widget-1 />
            </div>
            <div class="col-lg-6 col-xxl-4">
                <x-widgets.list-widget-9 :activities="$activities" :useronly="true" />
            </div>
            <div class="col-lg-6 col-xxl-4">
                <x-widgets.stats-widget-11 :openTicketCount="$openTicketCount" >
                    <x-slot name="icons"><x-icons.dashboard-ticket /></x-slot>
                </x-widgets.stats-widget-11>
                <x-widgets.stats-widget-12 :totalChatsThisWeek="$totalChatsThisWeek" />
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->