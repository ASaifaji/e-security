@props(['apps', 'users'])

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
                <div class="card card-custom card-stretch">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">External Events</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="event-creation-form">
                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Jenis Event <span class="text-danger">*</span></label>
                                <select class="form-control" id="input-event-type">
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="Deploy">Deploy</option>
                                    <option value="Testing">Testing</option>
                                    <option value="Laporan">Laporan</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label class="font-weight-bold">Aplikasi (Apps) <span class="text-danger">*</span></label>
                                <select class="form-control select2" id="input-app" style="width: 100%;">
                                    <option value="">-- Cari Aplikasi --</option>
                                    @foreach ($apps as $app)
                                        <option value="{{ $app->id }}">{{ $app->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-6">
                                <label class="font-weight-bold">PIC / User <span class="text-danger">*</span></label>
                                <select class="form-control select2" id="input-pic" style="width: 100%;">
                                    <option value="">-- Cari PIC --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name() }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex justify-content-between mb-8">
                                <button type="button" class="btn btn-primary font-weight-bold" id="btn-create-event">
                                    <i class="ki ki-plus icon-sm"></i> Create
                                </button>
                                <button type="button" class="btn btn-light-danger font-weight-bold" id="btn-clear-form">
                                    <i class="ki ki-close icon-sm"></i> Clear
                                </button>
                            </div>
                        </div>

                        <div class="separator separator-dashed my-5"></div>

                        <h4 class="card-label mb-3">Item Siap Dijadwalkan:</h4>
                        <div id="kt_calendar_external_events" class="fc-unthemed">
                            <div id="draggable-staging-area" style="min-height: 60px; border: 1px dashed #e4e6ef; padding: 10px; border-radius: 5px; display: flex; align-items: center; justify-content: center; background-color: #f3f6f9;">
                                <span class="text-muted text-center" id="empty-state-text">Isi form di atas dan klik <b>Create</b> untuk memunculkan item.</span>
                                </div>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <div class="col-lg-9">
                <!--begin::Card-->
                <div class="card card-custom card-stretch">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">Basic Calendar</h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="#" class="btn btn-light-primary font-weight-bold">
                            <i class="ki ki-plus"></i>Add Event</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="kt_calendar"></div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
        <!--end::Row-->
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Inisialisasi Select2 untuk pencarian
    if(jQuery().select2) {
        $('#input-app, #input-pic').select2({
            placeholder: "Ketik untuk mencari...",
            allowClear: true
        });
    }

    const btnCreate = document.getElementById('btn-create-event');
    const btnClear = document.getElementById('btn-clear-form');
    const stagingArea = document.getElementById('draggable-staging-area');

    // 2. Logika Tombol "Create"
    btnCreate.addEventListener('click', function() {
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
            case 'Testing':
                targetBgColor = '#ffc107'; 
                break;
            default:
                targetBgColor = '#3699FF'; 
        }

        // Sisipkan appId dan picId ke dalam atribut data HTML
        const draggableItemHTML = `
            <div class="btn btn-block text-left font-weight-bold fc-draggable-handle cursor-move d-flex align-items-center" 
                style="background-color: ${targetBgColor}; border: 1px solid ${targetBgColor}; color: #ffffff; text-shadow: 0px 1px 2px rgba(0,0,0,0.3);"
                data-title="${eventTitle}"
                data-bg-color="${targetBgColor}"
                data-type="${eventType}" 
                data-app-id="${appId}" 
                data-pic-id="${picId}">
                <i class="flaticon2-drag mr-3" style="color: #ffffff;"></i> 
                <span class="event-text-label">${eventTitle}</span>
            </div>
        `;

        stagingArea.innerHTML = draggableItemHTML;
        stagingArea.style.justifyContent = 'flex-start';
    });

    // 3. Logika Tombol "Clear / Cancel"
    btnClear.addEventListener('click', function() {
        $('#input-event-type').val('');
        $('#input-app').val('').trigger('change');
        $('#input-pic').val('').trigger('change');

        stagingArea.innerHTML = '<span class="text-muted text-center" id="empty-state-text">Isi form di atas dan klik <b>Create</b> untuk memunculkan item.</span>';
        stagingArea.style.justifyContent = 'center';
    });
});
</script>