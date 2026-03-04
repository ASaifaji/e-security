@props(['tickets'])

<!--begin::Card-->
<div class="card card-custom">
    
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">Complex Header
            <span class="d-block text-muted pt-2 font-size-sm">advance header options</span></h3>
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
        <table class="table table-bordered table-hover table-checkable mt-10" id="tickets_table">
            <thead>
                <tr>
                    <th colspan="2">Ticket Information</th>
                    <th colspan="4">Ticket Details</th>
                    <th colspan="2">User Information</th>
                    <th colspan="3">Status</th>
                    <th rowspan="2" class="align-middle">View</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Ticket Number</th>
                    <th>Subject</th>
                    <th>Description</th>
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
                        <td>{{ $ticket->description }}</td>
                        <td>{{ $ticket->type->name }}</td>
                        <td>{{ $ticket->app->name }}</td>
                        <td>{{ $ticket->requester->name() }}</td>
                        <td>{{ $ticket->tester ? $ticket->tester->name() : 'Unassigned' }}</td>
                        <td>{{ $ticket->priority->name }}</td>
                        <td>{{ $ticket->severity->name }}</td>
                        <td>{{ $ticket->status->name }}</td>
                        <td>
                            <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-sm btn-light-primary font-weight-bolder" title="View Details">
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
                    pagingType: 'full_numbers' 
                });
            });
        </script>
        @endpush
    </div>
</div>