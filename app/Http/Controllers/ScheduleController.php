<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Schedule;
use App\Models\Ticket;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $rules = [
            'title'      => 'required|string',
            'start_date' => 'required|date',
            'end_date'   => 'nullable|date|after_or_equal:start_date',
            'bg_color'   => 'required|string',
        ];

        if ($request->filled('ticket_id')){
            $rules['ticket_id'] = 'required|exists:tickets,id';
        } else {
            $rules['app_id'] = 'required|exists:apps,id';
            $rules['pic_id'] = 'required|exists:users,id';
        }

        $request->validate($rules);

        $dataToSave = [
            'title'      => $request->title,
            'bg_color'   => $request->bg_color,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'ticket_id'  => $request->ticket_id ?? null,
        ];

        if ($request->filled('ticket_id')) {
            $ticket = Ticket::find($request->ticket_id);
            
            $dataToSave['app_id'] = $ticket->app_id;
            
            $dataToSave['pic_id'] = $ticket->tester_id ?? $ticket->requester_id; 
            
        } else {
            $dataToSave['app_id'] = $request->app_id;
            $dataToSave['pic_id'] = $request->pic_id;
        }

        $schedule = Schedule::create($dataToSave);

        Activity::log("Scheduled a new {$schedule->event_type} event: {$schedule->title}", 'warning');

        return response()->json([
            'status'  => 'success',
            'message' => 'Jadwal berhasil disimpan!',
            'data'    => $schedule
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update([
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
        ]);

        Activity::log("Updated schedule for: {$schedule->title}", 'warning');

        return response()->json([
            'status'  => 'success',
            'message' => 'Tanggal jadwal diperbarui.'
        ]);
    }

    public function getEvents(Request $request)
    {
        
        $start = $request->query('start');
        $end = $request->query('end');

        $query = Schedule::query();

        if ($start && $end) {
            $query->whereBetween('start_date', [$start, $end])
                  ->orWhereBetween('end_date', [$start, $end]);
        }

        $schedules = $query->get();
        $events = [];

        foreach ($schedules as $schedule) {
            $events[] = [
                'id'              => $schedule->id,
                'title'           => $schedule->title,
                'start'           => $schedule->start_date,
                'end'             => $schedule->end_date,
                'backgroundColor' => $schedule->bg_color,
                'borderColor'     => $schedule->bg_color,
                'textColor'       => '#ffffff',
                'allDay'          => true, // Penting! Agar bentuknya kotak (bisa di-resize)
                
                // Masukkan data tambahan ke extendedProps (opsional, jika Anda butuh)
                'extendedProps'   => [
                    'appId'        => $schedule->app_id,
                    'picId'        => $schedule->pic_id,
                    'ticketId'     => $schedule->ticket_id,
                ]
            ];
        }

        return response()->json($events);
    }

    public function destroy($id)
    {

        $schedule = Schedule::findOrFail($id);
        
        $schedule->delete();

        Activity::log("Removed a scheduled test event: {$schedule->title}", 'danger');

        return response()->json([
            'status' => 'success',
            'message' => 'Event deleted successfully.'
        ]);
    }
}
