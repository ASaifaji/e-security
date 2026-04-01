@props(['apps', 'users', 'tickets'])

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
                <div class="card card-custom card-stretch card-dark-theme border-0">
                    <div class="card-header card-header-tabs-line nav-tabs-line-3x border-bottom-0">
                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x custom-dark-tabs">
                                <!--begin::Item-->
                                <li class="nav-item mr-3">
                                    <a class="nav-link active" data-toggle="tab" href="#tab_custom_event">
                                        <span class="nav-text font-size-lg text-white-85">Custom</span>
                                    </a>
                                </li>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <li class="nav-item mr-3">
                                    <a class="nav-link" data-toggle="tab" href="#tab_ticket_event">
                                        <span class="nav-text font-size-lg text-white-85">Ticket</span>
                                    </a>
                                </li>
                                <!--end::Item-->
                            </ul>
                        </div>
                        <!--end::Toolbar-->
                        <div class="card-title d-none d-md-flex">
                            <h3 class="card-label text-white-85">Schedule Events</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="tab_custom_event" role="tabpanel">
                                <div id="event-creation-form">
                                    <div class="form-group mb-4">
                                        <label class="font-weight-bold text-white-85">Jenis Event <span class="text-danger">*</span></label>
                                        <select class="form-control input-dark-custom" id="input-event-type">
                                            <option value="">-- Pilih Jenis --</option>
                                            <option value="Deploy">Deploy</option>
                                            <option value="Test">Test</option>
                                            <option value="Laporan">Laporan</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4 custom-select2-dark">
                                        <label class="font-weight-bold text-white-85">Aplikasi (Apps) <span class="text-danger">*</span></label>
                                        <select class="form-control select2" id="input-app" style="width: 100%;">
                                            <option value="">-- Cari Aplikasi --</option>
                                            @foreach ($apps as $app)
                                                <option value="{{ $app->id }}">{{ $app->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-6 custom-select2-dark">
                                        <label class="font-weight-bold text-white-85">PIC / User <span class="text-danger">*</span></label>
                                        <select class="form-control select2" id="input-pic" style="width: 100%;">
                                            <option value="">-- Cari PIC --</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name() }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="d-flex justify-content-between mb-8 border-top pt-5" style="border-color: #2D3748 !important;">
                                        <button type="button" class="btn btn-security-primary font-weight-bold" id="btn-create-custom-event">
                                            <i class="ki ki-plus text-white icon-sm"></i> Create
                                        </button>
                                        <button type="button" class="btn btn-dark-outline text-danger border-danger font-weight-bold" id="btn-clear-custom">
                                            <i class="ki ki-close icon-sm"></i> Clear
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tab_ticket_event" role="tabpanel">
                                <div id="ticket-creation-form">
                                    <div class="form-group mb-6 custom-select2-dark">
                                        <label class="font-weight-bold text-white-85">Pilih Ticket <span class="text-danger">*</span></label>
                                        <select class="form-control select2" id="input-ticket-id" style="width: 100%;">
                                            <option value="">-- Cari Ticket --</option>
                                            @isset($tickets)
                                                @foreach ($tickets as $ticket)
                                                    <option value="{{ $ticket->id }}" data-type-name="{{ $ticket->type->name ?? 'lainnya' }}">{{ $ticket->ticket_number }} - {{ $ticket->subject ?? '' }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                        <span class="form-text text-muted-slate">Ketik untuk mencari berdasarkan nomor atau judul tiket.</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-8 border-top pt-5" style="border-color: #2D3748 !important;">
                                        <button type="button" class="btn btn-security-primary font-weight-bold" id="btn-create-ticket-event">
                                            <i class="ki ki-plus text-white icon-sm"></i> Create
                                        </button>
                                        <button type="button" class="btn btn-dark-outline text-danger border-danger font-weight-bold" id="btn-clear-ticket">
                                            <i class="ki ki-close icon-sm"></i> Clear
                                        </button>
                                    </div>

                                </div>
                            </div>

                            <div class="separator separator-dashed my-5" style="border-bottom-color: #2D3748;"></div>

                            <h4 class="card-label mb-3 text-white-85">Item Siap Dijadwalkan:</h4>
                            <div id="kt_calendar_external_events" class="fc-unthemed">
                                <div id="draggable-staging-area" style="min-height: 60px; border: 1px dashed #334155; padding: 10px; border-radius: 5px; display: flex; align-items: center; justify-content: center; background-color: #121926;">
                                    <span class="text-muted-slate text-center" id="empty-state-text">Isi form di atas dan klik <b>Create</b> untuk memunculkan item.</span>
                                </div>
                            </div>
                            <span class="form-text text-muted-slate">drag n drop ke kalender untuk membuat jadwal, hover ke ujung kotak event dan resize untuk mengubah durasi, dan klik pada event untuk menghapusnya.</span>

                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-lg-9">
                <!--begin::Card-->
                <div class="card card-custom card-stretch card-dark-theme border-0">
                    <div class="card-header border-bottom-0">
                        <div class="card-title">
                            <h3 class="card-label text-white-85">Basic Calendar</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="kt_calendar" class="calendar-dark-theme"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
        <!--end::Row-->
    </div>
</div>

<style>
    .fc-unthemed .fc-today,
    .fc-day-today,
    td.fc-today {
        background-color: rgba(54, 153, 255, 0.15) !important;
    }

    .fc-unthemed .fc-today .fc-day-number,
    .fc-day-today .fc-daygrid-day-number {
        font-weight: bold !important;
        color: #3699FF !important;
    }
</style>


<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // Inisialisasi Select2 untuk pencarian
    if(jQuery().select2) {
        $('#input-app, #input-pic, #input-ticket-id').select2({
            placeholder: "Ketik untuk mencari...",
            allowClear: true,
        });
    }

    const btnCreateCustom = document.getElementById('btn-create-custom-event');
    const btnClearCustom = document.getElementById('btn-clear-custom');
    const btnCreateTicket = document.getElementById('btn-create-ticket-event');
    const btnClearTicket = document.getElementById('btn-clear-ticket');
    const stagingArea = document.getElementById('draggable-staging-area');

    // Logika Tombol "Create"
    btnCreateCustom.addEventListener('click', function() {
        const eventTypeSelect = document.getElementById('input-event-type');
        const eventType = eventTypeSelect.value;
        
        // Ambil ID (Value)
        const appId = $('#input-app').val();
        const picId = $('#input-pic').val();

        // Ambil Nama/Label (Teks) untuk tampilan Judul Event
        const appName = $('#input-app option:selected').text();
        const picName = $('#input-pic option:selected').text();

        if (!eventType || !appId || !picId) {
            alert('Mohon lengkapi Jenis Event, Aplikasi, dan PIC terlebih dahulu.');
            return;
        }

        // Judul menggunakan Nama (Teks)
        const eventTitle = `[${eventType}] ${appName} - ${picName}`;
        let targetBgColor = '';

        switch(eventType) {
            case 'Deploy':
                targetBgColor = '#fd7e14'; 
                break;
            case 'Test':
                targetBgColor = '#ffc107'; 
                break;
            case 'Laporan':
                targetBgColor = '#3699FF';
                break;
            default:
                targetBgColor = '#88BDF2';
        }

        // Sisipkan appId dan picId ke dalam atribut data HTML
        const draggableItemHTML = `
            <div class="fc-draggable-handle cursor-move d-flex align-items-center mb-2 p-3 rounded" 
                style="background-color: ${targetBgColor}20; border: 1px solid ${targetBgColor}; color: #ffffff; text-shadow: 0px 1px 2px rgba(0,0,0,0.3);"
                data-title="${eventTitle}"
                data-bg-color="${targetBgColor}"
                data-type="${eventType}"
                data-app-id="${appId}" 
                data-pic-id="${picId}">
                <i class="flaticon2-drag mr-3" style="color: ${targetBgColor};"></i> 
                <span class="font-weight-bold" style="font-size: 0.95rem;">${eventTitle}</span>
            </div>
        `;

        stagingArea.innerHTML = draggableItemHTML;
        stagingArea.style.justifyContent = 'flex-start';
    });

    btnCreateTicket.addEventListener('click', function(){
        const ticketSelect = $('#input-ticket-id')
        const ticketId = ticketSelect.val();
        const ticketText = ticketSelect.find('option:selected').text();
        const ticketTypeName = ticketSelect.find('option:selected').data('type-name');

        if (!ticketId) {
            alert('Mohon pilih Ticket terlebih dahulu.');
            return;
        }

        const eventTitle = `[Ticket] ${ticketText}`;
        let targetBgColor = ''; 

        switch(ticketTypeName) {
            case 'Deploy':
                targetBgColor = '#fd7e14'; 
                break;
            case 'Test':
                targetBgColor = '#ffc107'; 
                break;
            case 'Laporan':
                targetBgColor = '#3699FF';
                break;
            default:
                targetBgColor = '#88BDF2';
        }

        const draggableItemHTML = `
            <div class="fc-draggable-handle cursor-move d-flex align-items-center mb-2 p-3 rounded" 
                style="background-color: ${targetBgColor}20; border: 1px solid ${targetBgColor}; color: #ffffff; text-shadow: 0px 1px 2px rgba(0,0,0,0.3);"
                data-title="${eventTitle}"
                data-bg-color="${targetBgColor}"
                data-type="${ticketTypeName}"
                data-ticket-id="${ticketId}">
                <i class="flaticon2-drag mr-3" style="color: ${targetBgColor};"></i> 
                <span class="font-weight-bold" style="font-size: 0.95rem;">${eventTitle} <small>(${ticketTypeName})</small></span>
            </div>
        `;

        stagingArea.innerHTML = draggableItemHTML;
        stagingArea.style.justifyContent = 'flex-start';
    });

    // Logika Tombol "Clear / Cancel"
    function clearForm() {
        $('#input-event-type').val('');
        $('#input-app').val('').trigger('change');
        $('#input-pic').val('').trigger('change');
        $('#input-ticket-id').val('').trigger('change');

        stagingArea.innerHTML = '<span class="text-muted text-center" id="empty-state-text">Isi form di atas dan klik <b>Create</b> untuk memunculkan item.</span>';
        stagingArea.style.justifyContent = 'center';
    }

    btnClearCustom.addEventListener('click', clearForm);
    btnClearTicket.addEventListener('click', clearForm);
});
</script>