@props(['activities'])

<!--begin::List Widget 9-->
<div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header align-items-center border-0 mt-4">
        <h3 class="card-title align-items-start flex-column">
            <span class="font-weight-bolder text-light">Recent Activities</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">System and User logs</span>
        </h3>
        <div class="card-toolbar">
            <div class="dropdown dropdown-inline">
                <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ki ki-bold-more-ver"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                    <!--begin::Navigation-->
                    <ul class="navi navi-hover">
                        <li class="navi-header font-weight-bold py-4">
                            <span class="font-size-lg">Choose Label:</span>
                            <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
                        </li>
                        <li class="navi-separator mb-3 opacity-70"></li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-success">Customer</span>
                                </span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-danger">Partner</span>
                                </span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                </span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-primary">Member</span>
                                </span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-light">Staff</span>
                                </span>
                            </a>
                        </li>
                        <li class="navi-separator mt-3 opacity-70"></li>
                        <li class="navi-footer py-4">
                            <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                            <i class="ki ki-plus icon-sm"></i>Add new</a>
                        </li>
                    </ul>
                    <!--end::Navigation-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-4">
        <div class="timeline timeline-5 mt-3">
            @forelse ($activities as $activity)
                <div class="timeline-item align-items-start">
                    <div class="timeline-label font-weight-bolder text-white-85 font-size-lg text-right pr-3" style="width: 65px;">
                        {{ $activity->created_at->diffForHumans(null, true, true) }} </div>
                    
                    <div class="timeline-badge">
                        <i class="fa fa-genderless text-{{ $activity->type }} icon-xl"></i>
                    </div>
                    
                    <div class="font-weight-normal font-size-lg timeline-content text-muted-slate pl-3">
                        <span class="text-white-85 font-weight-bold">{{ $activity->user->name() }}</span> 
                        {!! $activity->description !!}
                    </div>
                </div>
            @empty
                <div class="text-center text-muted-slate py-5">
                    No recent activities found.
                </div>
            @endforelse
            
        </div>
        <!--end: Items-->
    </div>
    <!--end: Card Body-->
</div>
<!--end: Card-->
<!--end: List Widget 9-->