<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id',
        'user_id',
        'type',
        'path',
        'filename',
        'created_at',
        'updated_at',
    ];

    public function chat()
    {
        return $this->belongsTo(TicketChat::class, 'chat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
