@props(['ticket'])

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
                    <a href="#" class="btn btn-security-primary font-weight-bolder">
                        <i class="la la-edit text-white"></i> Edit Ticket
                    </a>
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
                        
                        <x-inbox.reply :ticket="$ticket" />
                    </div>

                    <div class="col-xl-4">
                        <div class="card card-custom gutter-b" style="background-color: #1B2538; border: 1px solid #2D3748; box-shadow: none;">
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title font-weight-bolder text-white-85">Summary</h3>
                            </div>
                            <div class="card-body pt-2">
                                <div class="d-flex align-items-center justify-content-between mb-5">
                                    <span class="font-weight-bold text-muted-slate mr-2">Type:</span>
                                    <span class="font-weight-bolder text-white">{{ $ticket->type->name }}</span>
                                </div>
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
                                    <span class="font-weight-bold text-muted mr-2">Tester:</span>
                                    @if ($ticket->tester)
                                        <div class="d-flex align-items-center">
                                            <span class="symbol symbol-35 symbol-dark-avatar mr-3">
                                                @if ($ticket->tester->avatar)
                                                    <div class="symbol-label" style="background-image:url('{{ asset('storage/' . $ticket->tester->avatar) }}')"></div>
                                                @else
                                                    <span class="symbol-label font-size-h6 font-weight-bold">
                                                        {{ substr($ticket->tester->name(), 0, 1) }}
                                                    </span>
                                                @endif
                                            </span>
                                            <span class="text-white font-weight-bold">{{ $ticket->tester->name() }}</span>
                                        </div>
                                    @else
                                        <span class="text-white">Unassigned</span>
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
                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                            @if(!$ticket->resolved_at)
                                <form action="{{ route('tickets.resolve', $ticket->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    <button type="submit" class="btn font-weight-bolder" style="background-color: rgba(52, 211, 153, 0.15); color: #34D399; border: 1px solid rgba(52, 211, 153, 0.3);" onclick="return confirm('Are you sure you want to mark this ticket as resolved?')">
                                        <i class="la la-check text-success"></i> Mark as Resolved
                                    </button>
                                </form>
                            @else
                                <button class="btn font-weight-bolder disabled" style="background-color: rgba(100, 116, 139, 0.1); color: #64748B; border: 1px dashed #334155;" disabled>
                                    <i class="la la-check-double text-muted-slate"></i> Already Resolved
                                </button>
                            @endif
                        @endif
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>