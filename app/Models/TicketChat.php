<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketChat extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'user_id',
        'message',
        'created_at',
        'updated_at',
    ];

    // Relasi ke Tiket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    // Relasi ke User (Pengirim)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ticketAttachment()
    {
        // Use hasOne to get a single attachment (the latest one)
        return $this->hasOne(TicketAttachment::class, 'chat_id')->latest();
    }

    public function attachments()
    {
        return $this->hasMany(TicketAttachment::class, 'chat_id');
    }
}