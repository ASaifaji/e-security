<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title'      => 'required|string',
            'start_date' => 'required|date',
            'end_date'   => 'nullable|date|after_or_equal:start_date',
            'event_type' => 'required|string',
            'app_id'     => 'required|integer',
            'pic_id'     => 'required|integer',
            'bg_color'   => 'required|string',
        ]);

        // Create data di tabel schedules
        $schedule = Schedule::create([
            'title'      => $request->title,
            'event_type' => $request->event_type,
            'app_id'     => $request->app_id,
            'pic_id'     => $request->pic_id,
            'bg_color'   => $request->bg_color,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
        ]);

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
                    'isCustomForm' => true,
                    'eventType'    => $schedule->event_type,
                    'appId'        => $schedule->app_id,
                    'picId'        => $schedule->pic_id,
                ]
            ];
        }

        return response()->json($events);
    }
}
