@props(['ticket', 'users'])

<x-subheader.breadcrumb text="Ticket Details">
    <x-subheader.breadcrumb-item href="{{ route('dashboard') }}" text="Dashboard" />
    <x-subheader.breadcrumb-item href="{{ route('tickets.index') }}" text="Tickets" />
    <x-subheader.breadcrumb-item href="{{ route('tickets.show', $ticket->id) }}" text="{{ $ticket->ticket_number }}" />
</x-subheader.breadcrumb>

<div class="d-flex flex-column-fluid">
    <div class="container">        
        <div class="card card-custom card-dark-theme border-0">
            <div class="card-header border-bottom-0">
                <div class="card-title">
                    <h3 class="card-label text-white-85">
                        Ticket Details: <span class="text-muted-slate">#{{ $ticket->ticket_number }}</span>
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('tickets.index') }}" class="btn btn-dark-outline font-weight-bolder mr-2">
                        <i class="la la-arrow-left"></i> Back
                    </a>
                    {{-- <a href="#" class="btn btn-security-primary font-weight-bolder">
                        <i class="la la-edit text-white"></i> Edit Ticket
                    </a> --}}
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-xl-8">
                        
                        <div class="mb-10">
                            <h5 class="font-weight-bold mb-3 text-white-85">Subject</h5>
                            <p class="text-muted-slate font-size-lg">
                                {{ $ticket->subject }}
                            </p>
                        </div>

                        <div class="separator separator-dashed my-5" style="border-bottom-color: #2D3748;"></div>

                        <div class="mb-10">
                            <h5 class="font-weight-bold mb-3 text-white-85">Description</h5>
                            <div class="font-size-lg p-5 rounded" style="background-color: #1B2538; color: #E2E8F0; border: 1px solid #2D3748;">
                                {!! nl2br(e($ticket->description)) !!}
                            </div>
                        </div>

                        <div class="mb-10">
                            <h5 class="font-weight-bold mb-3 text-white-85">Vulnerability Details</h5>
                            <div class="font-size-lg p-5 rounded" style="background-color: #1B2538; color: #E2E8F0; border: 1px solid #2D3748;">
                                {!! nl2br(e($ticket->vulnerability_details)) !!}
                            </div>
                        </div>

                        @if($ticket->resolved_at)
                            <div class="alert alert-custom fade show mb-5" style="background-color: rgba(52, 211, 153, 0.15); border: 1px solid rgba(52, 211, 153, 0.3);" role="alert">
                                <div class="alert-icon"><i class="flaticon2-check-mark text-success"></i></div>
                                <div class="alert-text text-white-85">
                                    <strong>Resolved on:</strong> {{ $ticket->resolved_at }}
                                </div>
                            </div>
                        @endif

                        
                        <!--begin::Messages-->
                        <div class="mb-3" id="kt_inbox_view">
                            @foreach ($ticket->chats as $chat)
                                <x-inbox.message :message="$chat"/>
                            @endforeach
                        </div>
                        <!--end:Messages-->
                        
                        @if ($ticket->status_id != 5)
                            <x-inbox.reply :ticket="$ticket" />
                        @else
                            <div class="d-flex align-items-center justify-content-center p-5 rounded mt-5" style="background-color: rgba(100, 116, 139, 0.1); border: 1px dashed #334155;">
                                <i class="la la-lock mr-2" style="color: #64748B; font-size: 1.5rem;"></i>
                                <span style="color: #64748B;" class="font-weight-bolder font-size-lg">
                                    This ticket is closed. The conversation has been locked.
                                </span>
                            </div>
                        @endif
                    </div>

                    <div class="col-xl-4">
                        <div class="card card-custom gutter-b" style="background-color: #1B2538; border: 1px solid #2D3748; box-shadow: none;">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title font-weight-bolder text-white-85">Summary</h3>
                            </div>
                            <div class="card-body pt-2">
                                <div class="d-flex align-items-center justify-content-between mb-5">
                                    <span class="font-weight-bold text-muted-slate mr-2">Status:</span>
                                    @php
                                        $statusName = strtolower($ticket->status->name);
                                        if ($statusName === 'open') {
                                            $statusColor = 'primary';
                                        } elseif ($statusName === 'in progress') {
                                            $statusColor = 'info';
                                        } elseif ($statusName === 'pending') {
                                            $statusColor = 'warning';
                                        } elseif ($statusName === 'closed') {
                                            $statusColor = 'Secondary';
                                        } else {
                                            $statusColor = 'success';
                                        }
                                    @endphp
                                    <span class="badge badge-dark-{{ $statusColor }} font-weight-bold py-4">
                                        {{ $ticket->status->name }}
                                    </span>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-5">
                                    <span class="font-weight-bold text-muted-slate mr-2">Priority:</span>
                                    @php
                                        $priorityName = strtolower($ticket->priority->name);
                                        if ($priorityName === 'critical') {
                                            $priorityColor = 'danger';
                                        } elseif ($priorityName === 'high') {
                                            $priorityColor = 'warning';
                                        } elseif ($priorityName === 'medium') {
                                            $priorityColor = 'info';
                                        } elseif ($priorityName === 'low') {
                                            $priorityColor = 'primary';
                                        } else {
                                            $priorityColor = 'success';
                                        }
                                    @endphp
                                    <span class="badge badge-dark-{{ $priorityColor }} font-weight-bold py-4">
                                        {{ $ticket->priority->name }}
                                    </span>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-5">
                                    <span class="font-weight-bold text-muted-slate mr-2">Severity:</span>
                                    @php
                                        $severityName = strtolower($ticket->severity->name);
                                        if ($severityName === 'critical') {
                                            $severityColor = 'danger';
                                        } elseif ($severityName === 'major') {
                                            $severityColor = 'warning';
                                        } elseif ($severityName === 'moderate') {
                                            $severityColor = 'info';
                                        } elseif ($severityName === 'low') {
                                            $severityColor = 'primary';
                                        } else {
                                            $severityColor = 'success';
                                        }
                                    @endphp
                                    <span class="badge badge-dark-{{ $severityColor }} font-weight-bold py-4">{{ $ticket->severity->name }}</span>
                                </div>

                                <div class="separator separator-dashed my-5" style="border-bottom-color: #2D3748;"></div>

                                <div class="d-flex align-items-center justify-content-between mb-5">
                                    <span class="font-weight-bold text-muted-slate mr-2">Application:</span>
                                    <span class="font-weight-bolder text-white">{{ $ticket->app->name }}</span>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-5">
                                    <span class="font-weight-bold text-muted-slate mr-2">Requester:</span>
                                    <div class="d-flex align-items-center">
                                        <span class="symbol symbol-35 symbol-dark-avatar mr-3">
                                            @if ($ticket->requester->avatar)
                                                <div class="symbol-label" style="background-image:url('{{ asset('storage/' . $ticket->requester->avatar) }}')"></div>
                                            @else
                                                <span class="symbol-label font-size-h6 font-weight-bold">
                                                    {{ substr($ticket->requester->name(), 0, 1) }}
                                                </span>
                                            @endif
                                        </span>
                                        <span class="text-white font-weight-bold">{{ $ticket->requester->name() }}</span>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-5">
                                    <span class="font-weight-bold text-muted mr-2">Assigned To:</span>
                                    @if ($ticket->assigned)
                                        <div class="d-flex align-items-center">
                                            <span class="symbol symbol-35 symbol-dark-avatar mr-3">
                                                @if ($ticket->assigned->avatar)
                                                    <div class="symbol-label" style="background-image:url('{{ asset('storage/' . $ticket->assigned->avatar) }}')"></div>
                                                @else
                                                    <span class="symbol-label font-size-h6 font-weight-bold">
                                                        {{ substr($ticket->assigned->name(), 0, 1) }}
                                                    </span>
                                                @endif
                                            </span>
                                            <span class="text-white font-weight-bold">{{ $ticket->assigned->name() }}</span>
                                        </div>
                                    @else
                                        <form action="{{ route('tickets.assign-user', $ticket->id) }}" method="POST" class="d-flex align-items-center m-0 assigned-user-form">
                                            @csrf
                                            <div style="width: 140px; height: 36px;">
                                                <x-form.select-picker name="assigned_id" search="true" required={{ true }} >
                                                    <option disabled selected>Select</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name() }}</option>
                                                    @endforeach
                                                </x-form.select-picker>
                                            </div>
                                            <button type="submit" class="btn btn-sm font-weight-bolder ml-2" style="background-color: #3B82F6; color: white;">
                                                Assign
                                            </button>
                                        </form>
                                    @endif
                                </div>

                                <div class="separator separator-dashed my-5" style="border-bottom-color: #2D3748;"></div>

                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold text-muted-slate mr-2">Created:</span>
                                    <span class="text-muted-slate">{{ $ticket->created_at->format('d M Y') }}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="font-weight-bold text-muted-slate mr-2">Last Update:</span>
                                    <span class="text-muted-slate">{{ $ticket->updated_at->diffForHumans() }}</span>
                                </div>

                            </div>
                        </div>
                        @if ((Auth::user()->role_id == 1 || Auth::user()->id == $ticket->requester_id || Auth::user()->id == $ticket->assigned_id) && $ticket->status_id != 5)
                            @if(!$ticket->resolved_at)
                                @if(Auth::user()->role_id == 1 || Auth::user()->id == $ticket->requester_id)
                                    <form action="{{ route('tickets.resolve', $ticket->id) }}" method="POST" style="display: inline-block; margin-right: 10px;">
                                        @csrf
                                        <button type="submit" class="btn font-weight-bolder" style="background-color: rgba(52, 211, 153, 0.15); color: #34D399; border: 1px solid rgba(52, 211, 153, 0.3);" onclick="return confirm('Are you sure you want to mark this ticket as resolved?')">
                                            <i class="la la-check text-success"></i> Resolve Ticket
                                        </button>
                                    </form>
                                    @if ($ticket->status_id == 3)
                                    <form action="{{ route('tickets.in-progress', $ticket->id) }}" method="POST" style="display: inline-block; margin-right: 10px;">
                                        @csrf
                                        <button type="submit" class="btn font-weight-bolder" style="background-color: rgba(255, 168, 0, 0.15); color: #FFA800; border: 1px solid rgba(255, 168, 0, 0.3);" onclick="return confirm('Are you sure you want to cancel the pending status for this ticket?')">
                                            <i class="la la-times text-warning"></i> Cancel Pending
                                        </button>
                                    </form>
                                    @endif
                                @else
                                    @if($ticket->status_id == 3)
                                        <button class="btn font-weight-bolder disabled" style="background-color: rgba(255, 168, 0, 0.15); color: #FFA800; border: 1px solid rgba(255, 168, 0, 0.3);" disabled>
                                            <i class="la la-clock text-warning"></i> Awaiting Approval
                                        </button>
                                    @else
                                        <form action="{{ route('tickets.pending', $ticket->id) }}" method="POST" style="display: inline-block; margin-right: 10px;">
                                            @csrf
                                            <button type="submit" class="btn font-weight-bolder" style="background-color: rgba(52, 211, 153, 0.15); color: #34D399; border: 1px solid rgba(52, 211, 153, 0.3);" onclick="return confirm('Are you sure you want to resolve this ticket?')">
                                                <i class="la la-check text-success"></i> Resolve Ticket
                                            </button>
                                        </form>
                                    @endif
                                @endif
                            @else
                                <button class="btn font-weight-bolder disabled" style="background-color: rgba(100, 116, 139, 0.1); color: #64748B; border: 1px dashed #334155;" disabled>
                                    <i class="la la-check-double text-muted-slate"></i> Already Resolved
                                </button>
                            @endif
                        @endif
                        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                            @if ($ticket->status_id != 5)
                                <form action="{{ route('tickets.close', $ticket->id) }}" method="POST" class="w-100">
                                    @csrf
                                    <button type="submit" class="btn font-weight-bolder w-100" style="background-color: rgba(239, 68, 68, 0.15); color: #EF4444; border: 1px solid rgba(239, 68, 68, 0.3);" onclick="return confirm('Are you sure you want to close this ticket?')">
                                        <i class="la la-times-circle text-danger"></i> Close Ticket
                                    </button>
                                </form>
                            @else
                                <button class="btn font-weight-bolder disabled w-100" style="background-color: rgba(100, 116, 139, 0.1); color: #64748B; border: 1px dashed #334155;" disabled>
                                    <i class="la la-times-circle text-muted-slate"></i> Ticket Closed
                                </button>
                            @endif
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    /* Strip the grid formatting just for the assignment dropdown */
    .assigned-user-form .form-group {
        margin-bottom: 0 !important;
    }
    .assigned-user-form .row {
        margin-left: 0 !important;
        margin-right: 0 !important;
    }
    .assigned-user-form .col-9 {
        flex: 0 0 100% !important; /* Force 100% width instead of 75% */
        max-width: 100% !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
    }
</style>
@endpush