<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\App;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validation
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'app_type' => 'required|in:1,2', // 1=Existing, 2=New
            'existing_app_id' => 'required_if:app_type,1|nullable|exists:apps,id',
            'new_app_name' => 'required_if:app_type,2|nullable|string|max:255',
            'new_app_pic' => 'required_if:app_type,2|nullable|exists:users,id',
            'priority_id' => 'required|in:1,2,3,4',
            'severity_id' => 'required|in:1,2,3,4',
            'status_id' => 'required|in:1,2,3,4,5',
        ]);

        if ($request->app_type == '2') {
            // Create New App
            $app = App::create([
                'name' => $request->new_app_name,
                'type' => 'Existing',
                'user_id' => $request->new_app_pic,
            ]);
            $appId = $app->id;
        } else {
            // Use Existing App
            $appId = $request->existing_app_id;
        }

        // 3. Generate Ticket Number (Format: TIK-YYYYMM-001)
        $dateCode = now()->format('Ym');
        $lastTicket = Ticket::query()
            ->where('ticket_number', 'like', "TCKT-$dateCode-%")
            ->orderBy('ticket_number', 'desc') 
            ->first();
            
        if ($lastTicket) {
            $lastNumber = intval(substr($lastTicket->ticket_number, -3));
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '001';
        }
        $ticketNumber = "TCKT-$dateCode-$newNumber";

        // 4. Create Ticket
        $ticket = Ticket::create([
            'ticket_number' => $ticketNumber,
            'subject' => $request->subject,
            'description' => $request->description,
            'vulnerability_details' => $request->vulnerability_details,
            'app_id' => $appId,
            'requester_id' => Auth::id(), // Currently logged in user
            'assigned_id' => null, // Optional at start
            'priority_id' => $request->priority_id,
            'severity_id' => $request->severity_id,
            'status_id' => $request->status_id,
        ]);

        $link = '<a href="' . route('tickets.show', $ticket->id) . '" style="color: #88BDF2;" class="font-weight-bold">#' . $ticket->ticket_number . '</a>';
        Activity::log("Created new ticket {$link}", 'success');

        // Check the hidden input value
        $action = $request->input('submit_action');

        if ($action == 'continue') {
            // Redirect back to the Edit page of the new ticket
            return redirect()->route('tickets.show', $ticket->id)->with('success', 'Ticket created.');
        } 
        elseif ($action == 'new') {
            // Redirect back to the Create page to add another
            return redirect()->route('tickets.create')->with('success', 'Ticket created. Add another one.');
        } 
        else {
            // Default: Redirect to the Index (Table) page
            return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
        }
    }

    public function markAsPending(Ticket $ticket)
    {
        $ticket->update(['status_id' => 3]); // Assuming 3 = Pending
        $link = '<a href="' . route('tickets.show', $ticket->id) . '" style="color: #88BDF2;" class="font-weight-bold">#' . $ticket->ticket_number . '</a>';
        Activity::log("Marked ticket {$link} as pending", 'warning');
        return back()->with('success', 'Ticket marked as pending.');
    }

    public function markAsInProgress(Ticket $ticket)
    {
        $ticket->update(['status_id' => 2]); // Assuming 2 = In Progress
        $link = '<a href="' . route('tickets.show', $ticket->id) . '" style="color: #88BDF2;" class="font-weight-bold">#' . $ticket->ticket_number . '</a>';
        Activity::log("Marked ticket {$link} as in progress", 'info');
        return back()->with('success', 'Ticket marked as in progress.');
    }

    public function markAsResolved(Ticket $ticket)
    {
        $ticket->update(['resolved_at' => now(), 'status_id' => 4]); // Assuming 4 = Resolved
        $link = '<a href="' . route('tickets.show', $ticket->id) . '" style="color: #88BDF2;" class="font-weight-bold">#' . $ticket->ticket_number . '</a>';
        Activity::log("Marked ticket {$link} as resolved", 'success');
        return back()->with('success', 'Ticket marked as resolved.');
    }

    public function close(Ticket $ticket)
    {
        $ticket->update(['status_id' => 5]);
        $link = '<a href="' . route('tickets.show', $ticket->id) . '" style="color: #88BDF2;" class="font-weight-bold">#' . $ticket->ticket_number . '</a>';
        Activity::log("Closed ticket {$link}", 'danger');
        return back()->with('success', 'Ticket has been closed');
    }

    public function assignUser(Request $request, Ticket $ticket)
    {
        $request->validate([
            'assigned_id' => 'required|exists:users,id'
        ]);
        $ticket->update(['assigned_id' => $request->assigned_id]);
        $link = '<a href="' . route('tickets.show', $ticket->id) . '" style="color: #88BDF2;" class="font-weight-bold">#' . $ticket->ticket_number . '</a>';
        $user = $ticket->assigned;
        Activity::log("Assigned {$user->name()} to ticket {$link}", 'info');
        return back()->with('success', 'assigned assigned to ticket.');
    }
}
