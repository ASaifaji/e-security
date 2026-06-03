@props(['tickets'])

<!--begin::Card-->
<div class="card card-custom card-dark-theme">
    
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label text-white-85">Complex Header
            <span class="d-block text-muted-slate pt-2 font-size-sm">advance header options</span></h3>
        </div>
        <div class="card-toolbar">
            {{-- <x-dropdown.dropdown-button text="Export">
                <x-slot name="icon"><x-icons.pen-and-ruler /></x-slot>
                <x-dropdown.navi-item href="#" text="Print" icon="la la-print" />
                <x-dropdown.navi-item href="#" text="Copy" icon="la la-copy" />
                <x-dropdown.navi-item href="#" text="Excel" icon="la la-file-excel-o" />
                <x-dropdown.navi-item href="#" text="CSV" icon="la la-file-text-o" />
                <x-dropdown.navi-item href="#" text="PDF" icon="la la-file-pdf-o" />
            </x-dropdown.dropdown-button> --}}
            <x-button.button href="/tickets/create" text="Add New" >
                <x-slot name="icon"><x-icons.flatten /></x-slot>
            </x-button.button>
        </div>
    </div>

    <div class="card-body">
        <div class="row mb-8 pb-4 border-bottom border-dark">
            <div class="col-md-4 mb-4">
                <label class="text-white-85">Priority</label>
                <select class="form-control select2-filter datatable-filter" data-column="6" multiple="multiple" data-placeholder="Select Ticket Priorities">
                    <option value="Critical">Critical</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                </select>
            </div>
            <div class="col-md-4 mb-4">
                <label class="text-white-85">Severity</label>
                <select class="form-control select2-filter datatable-filter" data-column="7" multiple="multiple" data-placeholder="Select Ticket Severities">
                    <option value="Critical">Critical</option>
                    <option value="Major">Major</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Low">Low</option>
                </select>
            </div>
            <div class="col-md-4 mb-4"> 
                <label class="text-white-85">Status</label>
                <select class="form-control select2-filter datatable-filter" data-column="8" multiple="multiple" data-placeholder="Select Ticket Statuses">
                    <option value="Open">Open</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Pending">Pending</option>
                    <option value="Resolved">Resolved</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>
        </div>
        <!--begin: Datatable-->
        <table class="table table-dark-custom table-hover table-checkable mt-10" id="tickets_table">
            <thead>
                <tr>
                    <th colspan="2">Ticket Information</th>
                    <th colspan="2">Ticket Details</th>
                    <th colspan="2">User Information</th>
                    <th colspan="3">Status</th>
                    <th rowspan="2" class="align-middle">View</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Ticket Number</th>
                    <th>Subject</th>
                    <th>App</th>
                    <th>Requester</th>
                    <th>Assigned</th>
                    <th>Priority</th>
                    <th>Severity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr data-date="{{ $ticket->created_at ? $ticket->created_at->format('Y-m-d') : '' }}">
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->ticket_number }}</td>
                        <td>{{ $ticket->subject }}</td>
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
                                @if($ticket->assigned)
                                    <span class="symbol symbol-35 symbol-dark-avatar mr-3">
                                        @if ($ticket->assigned->avatar)
                                            <div class="symbol-label" style="background-image:url('{{ asset('storage/' . $ticket->assigned->avatar) }}')"></div>
                                        @else
                                            <span class="symbol-label font-size-h6 font-weight-bold">
                                                {{ strtoupper(substr($ticket->assigned->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr($ticket->assigned->last_name ?? 'N', 0, 1)) }}
                                            </span>
                                        @endif
                                    </span>
                                    <span class="pic-text text-white-85 font-weight-bolder font-size-base">{{ $ticket->assigned->name() }}</span>
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
        <style>
            body .select2-container--default .select2-results__option {
                position: relative;
                padding-left: 32px !important;
            }

            body .select2-container--default .select2-results__option::before {
                content: "";
                position: absolute;
                left: 10px;
                top: 50%;
                transform: translateY(-50%);
                width: 16px;
                height: 16px;
                border: 2px solid #b5b5c3 !important; 
                border-radius: 3px;
                background-color: transparent !important;
            }

            body .select2-container--default .select2-results__option[aria-selected=true]::before {
                background-color: #3699ff !important;
                border-color: #3699ff !important;
                content: "✓"; 
                color: white !important;
                font-size: 12px;
                font-weight: bold;
                display: flex;
                align-items: center;
                justify-content: center;
                line-height: 16px;
            }

            body .select2-container--default .select2-results__option[aria-selected=true] {
                background-color: transparent !important; 
            }
        </style>

        @push('scripts')
        <script>
            $(document).ready(function() {

                let table = $('#tickets_table').DataTable({
                    responsive: true,
                    ordering: true,
                    pagingType: 'full_numbers',
                    language: {
                        search: "Search Ticket:",
                        lengthMenu: "Show _MENU_ entries"
                    }
                });

                $('.select2-filter').select2({
                    width: '100%',
                    closeOnSelect: false
                });

                function applyAllFilters() {
                    $('.datatable-filter').each(function() {
                        let colIndex = $(this).data('column');
                        let selectedValues = $(this).val(); 
                        
                        if (selectedValues && selectedValues.length > 0) {
                            let regexStr = selectedValues.map(val => $.fn.dataTable.util.escapeRegex(val)).join('|');
                            table.column(colIndex).search('^\\s*(' + regexStr + ')\\s*$', true, false);
                        } else {
                            table.column(colIndex).search('', true, false);
                        }
                    });
                    
                    table.draw();
                }

                $('.datatable-filter').on('change', function(e) {
                    if (e.namespace !== 'select2') {
                        applyAllFilters();
                    }
                });

                const urlParams = new URLSearchParams(window.location.search);
                let hasUrlFilters = false;

                $('.datatable-filter').each(function() {
                    let colIndex = $(this).data('column');
                    let paramMap = { 6: 'priority', 7: 'severity', 8: 'status' };
                    let paramName = paramMap[colIndex];

                    if (paramName && urlParams.has(paramName)) {
                        let values = urlParams.get(paramName).split(',').map(item => item.trim());
                        
                        $(this).val(values).trigger('change.select2');
                        hasUrlFilters = true;
                    }
                });
                
                if (hasUrlFilters) {
                    applyAllFilters();
                }

            });
        </script>
        @endpush
    </div>
</div>