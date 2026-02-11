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
            <x-button href="#" text="Add New" >
                <x-slot name="icon"><x-icons.flatten /></x-slot>
            </x-button>
        </div>
    </div>

    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable">
            <thead>
                <tr>
                    <th colspan="2">Ticket Information</th>
                    <th colspan="3">Ticket Details</th>
                    <th colspan="2">User Information</th>
                    <th colspan="3">Status</th>
                    <th colspan="2">Timestamps</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Ticket Number</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>App</th>
                    <th>Requester</th>
                    <th>Tester</th>
                    <th>Priority</th>
                    <th>Severity</th>
                    <th>Status</th>
                    <th>Resolved At</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->ticket_number }}</td>
                        <td>{{ $ticket->subject }}</td>
                        <td>{{ $ticket->description }}</td>
                        <td>{{ $ticket->app->name }}</td>
                        <td>{{ $ticket->requester->name }}</td>
                        <td>{{ $ticket->tester->name }}</td>
                        <td>{{ $ticket->priority->name }}</td>
                        <td>{{ $ticket->severity->name }}</td>
                        <td>{{ $ticket->status->name }}</td>
                        <td>{{ $ticket->resolved_at }}</td>
                        <td>{{ $ticket->created_at }}</td>
                        <td nowrap="nowrap"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>