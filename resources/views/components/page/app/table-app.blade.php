@props(['apps'])

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
            <x-button.button href="/apps/create" text="Add New" >
                <x-slot name="icon"><x-icons.flatten /></x-slot>
            </x-button.button>
        </div>
    </div>

    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-bordered table-hover table-checkable mt-10" id="apps_table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>App Name</th>
                    <th>Type</th>
                    <th>PIC</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach($apps as $app)
                    <tr>
                        <td>{{ $app->id }}</td>
                        <td>{{ $app->name }}</td>
                        <td>{{ $app->type }}</td>
                        <td>{{ $app->users->name }}</td>
                        <td>
                            {{-- <a href="{{ route('apps.show', $app->id) }}" class="btn btn-sm btn-light-primary font-weight-bolder" title="View Details">
                                View
                            </a> --}}
                            <a href="#" class="btn btn-sm btn-light-primary font-weight-bolder" title="View Details">
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
                $('#apps_table').DataTable({
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