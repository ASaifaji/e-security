"use strict";

var KTCalendarExternalEvents = function() {

    var initExternalEvents = function() {
        $('#kt_calendar_external_events .fc-draggable-handle').each(function() {
            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true, // maintain when user navigates (see docs on the renderEvent method)
                classNames: [$(this).data('color')],
                description: 'Lorem ipsum dolor eius mod tempor labore'
            });
        });
    }

    var initCalendar = function() {
        var todayDate = moment().startOf('day');
        var YM = todayDate.format('YYYY-MM');
        var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
        var TODAY = todayDate.format('YYYY-MM-DD');
        var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

        var calendarEl = document.getElementById('kt_calendar');
        var containerEl = document.getElementById('kt_calendar_external_events');

        var Draggable = FullCalendarInteraction.Draggable;

        new Draggable(containerEl, {
            itemSelector: '.fc-draggable-handle',
            eventData: function(eventEl) {
                if (eventEl.hasAttribute('data-bg-color')) {
                    return {
                        title: eventEl.getAttribute('data-title'),
                        backgroundColor: eventEl.getAttribute('data-bg-color'),
                        borderColor: eventEl.getAttribute('data-bg-color'),
                        textColor: '#ffffff',
                        isCustomForm: true,
                        eventType: eventEl.getAttribute('data-type'),
                        
                        // Ambil ID dari atribut data
                        appId: eventEl.getAttribute('data-app-id'),
                        picId: eventEl.getAttribute('data-pic-id')
                    };
                }
                return $(eventEl).data('event');
            }
        });

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],

            isRTL: KTUtil.isRTL(),
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },

            height: 800,
            contentHeight: 780,
            aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

            nowIndicator: true,
            now: TODAY + 'T09:25:00', // just for demo

            views: {
                dayGridMonth: { buttonText: 'month' },
                timeGridWeek: { buttonText: 'week' },
                timeGridDay: { buttonText: 'day' }
            },

            defaultView: 'dayGridMonth',
            defaultDate: TODAY,

            droppable: true, // this allows things to be dropped onto the calendar
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            navLinks: true,
            events: '/schedules/events',
            
            eventReceive: function(info) {
                $.ajaxSetup({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                var startMoment = moment(info.event.start);
                var startDate = startMoment.format('YYYY-MM-DD HH:mm:ss');
                
                var endDate;
                if (info.event.end) {
                    endDate = moment(info.event.end).subtract(1, 'seconds').format('YYYY-MM-DD HH:mm:ss');
                } else {
                    endDate = startMoment.clone().endOf('day').format('YYYY-MM-DD HH:mm:ss');
                }

                var postData = {
                    title: info.event.title,
                    start_date: startDate,
                    end_date: endDate,
                    bg_color: info.event.backgroundColor,
                    event_type: info.event.extendedProps.eventType || 'Lainnya',
                    app_id: info.event.extendedProps.appId || null, 
                    pic_id: info.event.extendedProps.picId || null  
                };

                $.ajax({
                    url: '/schedules/store',
                    type: 'POST',
                    data: postData,
                    success: function(response) {
                        toastr.success(response.message);
                        
                        info.event.remove(); 
                        
                        calendar.addEvent({
                            id: response.data.id,
                            title: response.data.title,
                            start: response.data.start_date,
                            end: response.data.end_date,

                            allDay: true,

                            backgroundColor: response.data.bg_color,
                            borderColor: response.data.bg_color,
                            textColor: '#ffffff',
                            
                            editable: true,
                            startEditable: true,
                            durationEditable: true,

                            extendedProps: {
                                isCustomForm: true,
                                eventType: response.data.event_type,
                                appId: response.data.app_id,
                                picId: response.data.pic_id
                            }
                        });
                    },
                    error: function(xhr) {
                        console.error('Error saat menyimpan jadwal awal:', xhr.responseText);
                        toastr.error('Terjadi kesalahan saat menyimpan jadwal.');
                        info.event.remove();
                    }
                });
            },
            
            eventDrop: function(info) {
                if (!info.event.id) {
                    toastr.warning('Jadwal ini belum tersimpan sempurna di database atau merupakan jadwal statis.');
                    info.revert();
                    return;
                }

                $.ajaxSetup({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                var startMoment = moment(info.event.start);
                var startDate = startMoment.format('YYYY-MM-DD HH:mm:ss');
                
                var endDate;
                if (info.event.end) {
                    endDate = moment(info.event.end).subtract(1, 'seconds').format('YYYY-MM-DD HH:mm:ss');
                } else {
                    endDate = startMoment.clone().endOf('day').format('YYYY-MM-DD HH:mm:ss');
                }

                $.ajax({
                    url: '/schedules/update/' + info.event.id, 
                    type: 'POST', // 2. UBAH KE POST
                    data: {
                        _method: 'PUT', // 3. TAMBAHKAN SPOOFING LARAVEL
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        toastr.info('Jadwal berhasil digeser.');
                    },
                    error: function(xhr) {
                        // 4. Tampilkan pesan error asli di console (tekan F12 di browser)
                        console.error('Error pindah jadwal:', xhr.responseText);
                        toastr.error('Gagal memindahkan jadwal.');
                        info.revert(); 
                    }
                });
            },

            eventResize: function(info) {
                if (!info.event.id) {
                    toastr.warning('Jadwal ini belum tersimpan sempurna di database atau merupakan jadwal statis.');
                    info.revert();
                    return;
                }

                $.ajaxSetup({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                });

                var startMoment = moment(info.event.start);
                var startDate = startMoment.format('YYYY-MM-DD HH:mm:ss');
                
                var endDate;
                if (info.event.end) {
                    endDate = moment(info.event.end).subtract(1, 'seconds').format('YYYY-MM-DD HH:mm:ss');
                } else {
                    endDate = startMoment.clone().endOf('day').format('YYYY-MM-DD HH:mm:ss');
                }

                $.ajax({
                    url: '/schedules/update/' + info.event.id,
                    type: 'POST', // 2. UBAH KE POST
                    data: {
                        _method: 'PUT', // 3. TAMBAHKAN SPOOFING LARAVEL
                        start_date: startDate,
                        end_date: endDate
                    },
                    success: function(response) {
                        toastr.info('Durasi jadwal berhasil diperbarui.');
                    },
                    error: function(xhr) {
                        // 4. Tampilkan pesan error asli di console (tekan F12 di browser)
                        console.error('Error ubah durasi:', xhr.responseText);
                        toastr.error('Gagal memperbarui durasi jadwal.');
                        info.revert(); 
                    }
                });
            },

            drop: function(arg) {
                // is the "remove after drop" checkbox checked?
                if ($('#kt_calendar_external_events_remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(arg.draggedEl).remove();
                }
            },

            eventRender: function(info) {
                var element = $(info.el);

                if (info.event.extendedProps && info.event.extendedProps.isCustomForm) {
                    // Paksa warna elemen dan class .fc-title di dalamnya jadi putih
                    element.css('color', '#ffffff');
                    element.find('.fc-title').css('color', '#ffffff');
                    element.find('.fc-time').css('color', '#ffffff');
                }

                if (info.event.extendedProps && info.event.extendedProps.description) {
                    if (element.hasClass('fc-day-grid-event')) {
                        element.data('content', info.event.extendedProps.description);
                        element.data('placement', 'top');
                        KTApp.initPopover(element);
                    } else if (element.hasClass('fc-time-grid-event')) {
                        element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                    } else if (element.find('.fc-list-item-title').lenght !== 0) {
                        element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                    }
                }
            }
        });

        calendar.render();
    }

    return {
        //main function to initiate the module
        init: function() {
            initExternalEvents();
            initCalendar();
        }
    };
}();

jQuery(document).ready(function() {
    KTCalendarExternalEvents.init();
});
