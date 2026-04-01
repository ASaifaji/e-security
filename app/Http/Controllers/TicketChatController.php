<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketChat;
use App\Models\TicketAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TicketChatController extends Controller
{
    public function store(Request $request, Ticket $ticket)
    {
        if ($ticket->status_id == 5) {
            return back()->withErrors(['message' => 'Cannot reply to a closed ticket.']);
        }
        
        $request->validate([
            'message'    => 'required|string',
            'attachment' => 'nullable|file|max:10240', // Max 10MB
        ]);

        $chat = TicketChat::create([
            'ticket_id' => $ticket->id,
            'user_id'   => Auth::id(),
            'message'   => $request->message,
            // Add other chat fields if your model has them
        ]);

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            
            // Store file in 'storage/app/attachments'
            $path = $file->store('attachments'); 

            TicketAttachment::create([
                'chat_id'  => $chat->id,           // The ID of the message we just created
                'user_id'  => Auth::id(),          // The current user
                'type'     => $file->extension(),  // png, jpg, pdf, etc.
                'path'     => $path,               // The storage path
                'filename' => $file->getClientOriginalName(),
            ]);
        }

        return back()->with('success', 'Reply posted with attachment!');
    }
    public function download(Ticket $ticket, TicketAttachment $attachment)
    {
        
        if ($attachment->chat->ticket_id !== $ticket->id) {
            abort(404);
        }

        
        if (Auth::id() !== $ticket->user_id && !Auth::user()->role_id == 1) { 
            abort(403, 'Unauthorized access to this attachment.');
        }

        
        if (!Storage::exists($attachment->path)) {
            abort(404, 'File not found on server.');
        }

        
        return Storage::download($attachment->path, $attachment->filename);
    }
}