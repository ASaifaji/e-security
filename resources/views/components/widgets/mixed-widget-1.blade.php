<!--begin::Mixed Widget 1-->
<div class="card card-custom bg-gray-100 card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 bg-danger py-5">
        <h3 class="card-title font-weight-bolder text-white">Ticket Flow</h3>  
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body p-0 position-relative overflow-hidden">
        <div class="card-rounded-bottom bg-danger" style="height: 200px"></div>
        <!--begin::Stats-->
        <div class="card-spacer mt-n25">
            <!--begin::Row-->
            <div class="row m-0">
                <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                    <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                        <x-icons.ticket-02 />
                    </span>
                    <a href="#" class="text-primary font-weight-bold font-size-h6">Open Tickets</a>
                </div>
                <div class="col bg-light-danger px-6 py-8 rounded-xl mb-7">
                    <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                        <x-icons.warning-1-circle />
                    </span>
                    <a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">High Priority Tickets</a>
                </div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row m-0">
                <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <x-icons.clipboard-pending />
                    </span>
                    <a href="#" class="text-warning font-weight-bold font-size-h6 mt-2">Pending Tickets</a>
                </div>
                <div class="col bg-light-success px-6 py-8 rounded-xl">
                    <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                        <x-icons.clipboard-check />
                    </span>
                    <a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Resolved today</a>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Stats-->
    </div>
    <!--end::Body-->
</div>
<!--end::Mixed Widget 1-->