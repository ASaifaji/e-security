@props(['apps'])

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
            <x-button.button href="/apps/create" text="Add New" >
                <x-slot name="icon"><x-icons.flatten /></x-slot>
            </x-button.button>
        </div>
    </div>

    <div class="card-body">
        <!--begin: Datatable-->
        <table class="table table-dark-custom table-hover table-checkable mt-10" id="apps_table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>App Name</th>
                    <th>Type</th>
                    <th>PIC</th>
                </tr>
            </thead>
            <tbody>
                @foreach($apps as $app)
                    <tr>
                        <td>{{ $app->id }}</td>
                        <td>{{ $app->name }}</td>
                        <td>{{ $app->type }}</td>
                        <td>
                            <a href="javascript:void(0);" class="d-inline-flex align-items-center pic-assign-btn p-2 rounded" title="Click to Assign or Change PIC" data-app-id="{{ $app->id }}">
                                <span class="symbol symbol-35 symbol-dark-avatar mr-3">
                                    @if ($app->users->avatar)
                                        <div class="symbol-label" style="background-image:url('{{ asset('storage/' . $app->users->avatar) }}')"></div>
                                    @else
                                        <span class="symbol-label font-size-h6 font-weight-bold">
                                            {{ strtoupper(substr($app->users->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr($app->users->last_name ?? 'N', 0, 1)) }}
                                        </span>
                                    @endif
                                </span>
                                <span class="pic-text text-white-85 font-weight-bolder font-size-base">{{ $app->users->name() }}</span>
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