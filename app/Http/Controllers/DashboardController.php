<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketChat;
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

        $chatDates = [];
        $chatData = [];
        $totalChatsThisWeek = 0;

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            
            $chatDates[] = $date->translatedFormat('D');

            $dailyCount = TicketChat::whereDate('created_at', $date->toDateString())->count();

            $chatData[] = $dailyCount;
            $totalChatsThisWeek += $dailyCount;
        }

        return view('dashboard', compact('openTicketCount', 'dates', 'openTickets', 'chatDates', 'chatData', 'totalChatsThisWeek'));
    }
}
