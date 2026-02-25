@props(['icons', 'openTicketCount'])

<!--begin::Stats Widget 11-->
<div class="card card-custom card-stretch card-stretch-half gutter-b">
    <!--begin::Body-->
    <div class="card-body p-0">
        <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
            <span class="symbol symbol-50 symbol-light-success mr-2">
                <span class="symbol-label">
                    <span class="svg-icon svg-icon-xl svg-icon-success">
                        {{ $icons }}
                    </span>
                </span>
            </span>
            <div class="d-flex flex-column text-right">
                <span class="text-dark-75 font-weight-bolder font-size-h3">{{ $openTicketCount }} Open Ticket</span>
                <span class="text-muted font-weight-bold mt-2">Ticket Status</span>
            </div>
        </div>
        <div id="chart_2" style="height: 150px"></div>
        {{-- <div id="kt_stats_widget_11_chart" class="card-rounded-bottom" data-color="success" style="height: 150px"></div> --}}
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 11-->