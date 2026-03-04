@props(['totalChatsThisWeek'])

<!--begin::Stats Widget 12-->
<div class="card card-custom card-open-ticket-dark card-stretch card-stretch-half gutter-b">
    <!--begin::Body-->
    <div class="card-body p-0">
        <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
            <span class="symbol symbol-50 symbol-dark-detail mr-2">
                <span class="symbol-label">
                    <span class="svg-icon svg-icon-xl svg-icon-info">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Chart-pie.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"/>
                                <path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon-->
                    </span>
                </span>
            </span>
            <div class="d-flex flex-column text-right">
                <span class="text-white-85 font-weight-bolder font-size-h3">{{ $totalChatsThisWeek }} Chats</span>
                <span class="text-muted-slate font-weight-bold mt-2">Weekly Chat Count</span>
            </div>
        </div>
        <div id="chart_chat_ticket" class="chart-dark-bg card-rounded-bottom" style="height: 150px"></div>
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 12-->