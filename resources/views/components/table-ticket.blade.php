@props(['tickets'])

<!--begin::Card-->
<div class="card card-custom card-dark-theme">
    
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label text-white-85">Complex Header
            <span class="d-block text-muted-slate pt-2 font-size-sm">advance header options</span></h3>
        </div>
        <div class="card-toolbar">
            <x-dropdown.dropdown-button text="Export">
                <x-slot name="icon"><x-icons.pen-and-ruler /></x-slot>
                <x-dropdown.navi-item href="#" text="Print" icon="la la-print" />
                <x-dropdown.navi-item href="#" text="Copy" icon="la la-copy" />
                <x-dropdown.navi-item href="#" text="Excel" icon="la la-file-excel-o" />
                <x-dropdown.navi-item href="#" text="CSV" icon="la la-file-text-o" />
                <x-dropdown.navi-item href="#" text="PDF" icon="la la-file-pdf-o" />
            </x-dropdown.dropdown-button>
            <x-button.button href="/tickets/create" text="Add New" >
                <x-slot name="icon"><x-icons.flatten /></x-slot>
            </x-button.button>
        </div>
    </div>

    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-dark-custom table-hover table-checkable mt-10" id="tickets_table">
            <thead>
                <tr>
                    <th colspan="2">Ticket Information</th>
                    <th colspan="3">Ticket Details</th>
                    <th colspan="2">User Information</th>
                    <th colspan="3">Status</th>
                    <th rowspan="2" class="align-middle">View</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Ticket Number</th>
                    <th>Subject</th>
                    <th>Type</th>
                    <th>App</th>
                    <th>Requester</th>
                    <th>Tester</th>
                    <th>Priority</th>
                    <th>Severity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->ticket_number }}</td>
                        <td>{{ $ticket->subject }}</td>
                        <td>{{ $ticket->type->name }}</td>
                        <td>{{ $ticket->app->name }}</td>
                        <td>
                            <a href="javascript:void(0);" class="d-inline-flex align-items-center pic-assign-btn p-2 rounded" title="Click to Assign or Change PIC" data-ticket-id="{{ $ticket->id }}">
                                @if($ticket->requester)
                                    <span class="symbol symbol-35 symbol-dark-avatar mr-3">
                                        @if ($ticket->requester->avatar)
                                            <div class="symbol-label" style="background-image:url('{{ asset('storage/' . $ticket->requester->avatar) }}')"></div>
                                        @else
                                            <span class="symbol-label font-size-h6 font-weight-bold">
                                                {{ strtoupper(substr($ticket->requester->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr($ticket->requester->last_name ?? 'N', 0, 1)) }}
                                            </span>
                                        @endif
                                    </span>
                                    <span class="pic-text text-white-85 font-weight-bolder font-size-base">{{ $ticket->requester->name() }}</span>
                                @else
                                    <span class="symbol symbol-35 symbol-dark-unassigned mr-3">
                                        <span class="symbol-label font-size-h5 font-weight-bold">?</span>
                                    </span>
                                    <span class="pic-text text-muted-slate font-weight-bolder font-size-base">Unassigned</span>
                                @endif
                            </a>
                        </td>
                        <td>
                            <a href="javascript:void(0);" class="d-inline-flex align-items-center pic-assign-btn p-2 rounded" title="Click to Assign or Change PIC" data-ticket-id="{{ $ticket->id }}">
                                @if($ticket->tester)
                                    <span class="symbol symbol-35 symbol-dark-avatar mr-3">
                                        @if ($ticket->tester->avatar)
                                            <div class="symbol-label" style="background-image:url('{{ asset('storage/' . $ticket->tester->avatar) }}')"></div>
                                        @else
                                            <span class="symbol-label font-size-h6 font-weight-bold">
                                                {{ strtoupper(substr($ticket->tester->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr($ticket->tester->last_name ?? 'N', 0, 1)) }}
                                            </span>
                                        @endif
                                    </span>
                                    <span class="pic-text text-white-85 font-weight-bolder font-size-base">{{ $ticket->tester->name() }}</span>
                                @else
                                    <span class="symbol symbol-35 symbol-dark-unassigned mr-3">
                                        <span class="symbol-label font-size-h5 font-weight-bold">?</span>
                                    </span>
                                    <span class="pic-text text-muted-slate font-weight-bolder font-size-base">Unassigned</span>
                                @endif
                            </a>
                        </td>
                        <td>
                            @php
                                $priorityName = strtolower($ticket->priority->name ?? '');
                                if ($priorityName === 'critical') {
                                    $priorityColor = 'danger';
                                } elseif ($priorityName === 'high') {
                                    $priorityColor = 'warning';
                                } elseif ($priorityName === 'medium') {
                                    $priorityColor = 'info';
                                } elseif ($priorityName === 'low') {
                                    $priorityColor = 'primary';
                                } else {
                                    $priorityColor = 'secondary';
                                }
                            @endphp
                            <span class="badge badge-dark-{{ $priorityColor }}">{{ $ticket->priority->name ?? '-' }}</span>
                        </td>
                        <td>
                            @php
                                $severityName = strtolower($ticket->severity->name ?? '');
                                if ($severityName === 'critical') {
                                    $severityColor = 'danger';
                                } elseif ($severityName === 'major') {
                                    $severityColor = 'warning';
                                } elseif ($severityName === 'moderate') {
                                    $severityColor = 'info';
                                } elseif ($severityName === 'low') {
                                    $severityColor = 'primary';
                                } else {
                                    $severityColor = 'secondary';
                                }
                            @endphp
                            <span class="badge badge-dark-{{ $severityColor }} font-weight-bold py-2 px-3">
                                {{ $ticket->severity->name ?? '-' }}
                            </span>
                        </td>
                        <td>
                            @php
                                $statusName = strtolower($ticket->status->name ?? '');
                                if ($statusName === 'open') {
                                    $statusColor = 'primary';
                                } elseif ($statusName === 'in progress') {
                                    $statusColor = 'info';
                                } elseif ($statusName === 'pending') {
                                    $statusColor = 'warning';
                                } elseif ($statusName === 'closed') {
                                    $statusColor = 'secondary';
                                } else {
                                    $statusColor = 'success'; // for resolved/done
                                }
                            @endphp
                            <span class="badge badge-dark-{{ $statusColor }} font-weight-bold py-2 px-3">
                                {{ $ticket->status->name ?? '-' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-sm btn-outline-info font-weight-bolder" title="View Details">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @push('scripts')
        <script>
            $(document).ready(function() {
                $('#tickets_table').DataTable({
                    responsive: true,
                    ordering: true,
                    // distinct styling for the pagination
                    pagingType: 'full_numbers',
                    language: {
                        search: "Search Ticket:",
                        lengthMenu: "Show _MENU_ entries"
                    }
                });
            });
        </script>
        @endpush
    </div>
</div>