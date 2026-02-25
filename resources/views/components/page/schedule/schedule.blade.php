<x-subheader.breadcrumb text="Schhedule">
    <x-subheader.breadcrumb-item href="{{ route('dashboard') }}" text="Dashboard" />
    <x-subheader.breadcrumb-item href="{{ route('schedules.index') }}" text="Schedules" />
</x-subheader.breadcrumb>

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-lg-3">
                <!--begin::Card-->
                <div class="card card-custom card-stretch">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">External Events</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="kt_calendar_external_events" class="fc-unthemed">
                            <div class="btn btn-block text-left font-weight-bold btn-light-primary fc-draggable-handle mb-5 cursor-move" data-color="fc-event-primary">Meeting</div>
                            <div class="btn btn-block text-left font-weight-bold btn-light-success fc-draggable-handle mb-5 cursor-move" data-color="fc-event-primary">Conference Call</div>
                            <div class="btn btn-block text-left font-weight-bold btn-light-danger fc-draggable-handle mb-5 cursor-move" data-color="fc-event-success">Dinner</div>
                            <div class="btn btn-block text-left font-weight-bold btn-light-info fc-draggable-handle mb-5 cursor-move" data-color="fc-event-warning">Product Launch</div>
                            <div class="btn btn-block text-left font-weight-bold btn-light-warning fc-draggable-handle cursor-move" data-color="fc-event-danger">Reporting</div>
                            <div class="separator separator-dashed my-10"></div>
                            <div class="btn btn-block text-left font-weight-bold btn-light-success fc-draggable-handle cursor-move" data-color="fc-event-success">Project Update</div>
                            <div class="btn btn-block text-left font-weight-bold btn-light-primary fc-draggable-handle cursor-move" data-color="fc-event-info">Staff Meeting</div>
                            <div class="btn btn-block text-left font-weight-bold btn-light-danger fc-draggable-handle cursor-move" data-color="fc-event-dark">Lunch</div>
                            <div class="separator separator-dashed my-10"></div>
                            <div>
                                <label class="checkbox checkbox-primary">
                                <input type="checkbox" id="kt_calendar_external_events_remove" />Remove after drop
                                <span></span></label>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-lg-9">
                <!--begin::Card-->
                <div class="card card-custom card-stretch">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Basic Calendar</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-light-primary font-weight-bold">
                            <i class="ki ki-plus"></i>Add Event</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="kt_calendar"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
        <!--end::Row-->
    </div>
</div>