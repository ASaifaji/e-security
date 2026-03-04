@props(['icons', 'openTicketCount'])

<!--begin::Stats Widget 11-->
<div class="card card-custom card-open-ticket-dark card-stretch card-stretch-half gutter-b">
    <!--begin::Body-->
    <div class="card-body p-0">
        <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
            <span class="symbol symbol-50 symbol-dark-detail mr-2">
                <span class="symbol-label">
                    <span class="svg-icon svg-icon-xl svg-icon-primary">
                        {{ $icons }}
                    </span>
                </span>
            </span>
            <div class="d-flex flex-column text-right">
                <span class="text-white-85 font-weight-bolder font-size-h3">{{ $openTicketCount }} Open Ticket</span>
                <span class="text-muted-slate font-weight-bold mt-2">Ticket Status</span>
            </div>
        </div>
        <div id="chart_open_ticket" class="chart-dark-bg" style="height: 150px"></div>
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 11-->