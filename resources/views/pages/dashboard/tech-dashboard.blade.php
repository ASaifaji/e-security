@include('components.dashboard-subheader')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Dashboard-->
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-6 col-xxl-4">
                @include('components.widgets.mixed-widget-1')
            </div>
            <div class="col-lg-6 col-xxl-4">
                @include('components.widgets.list-widget-9')
            </div>
            <div class="col-lg-6 col-xxl-4">
                @include('components.widgets.stats-widget-11')
                @include('components.widgets.stats-widget-12')
            </div>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->