<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    //
    public function techDashboard()
    {
        $dates = [];
        $openTickets = [];

        for ($i = 6; $i >= 0; $i--){
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $dates[] = $date;

            $count =Ticket::where('status_id', 1)
                ->whereDate('created_at', $date)
                ->count();

            $openTickets[] = $count;
        }

        $openTicketCount = Ticket::where('status_id', 1)->count();
        return view('dashboard', compact('openTicketCount', 'dates', 'openTickets'));
    }
}
