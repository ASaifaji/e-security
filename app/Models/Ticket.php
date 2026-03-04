<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'subject',
        'description',
        'type_id',
        'vulnerability_details',
        'app_id',
        'requester_id',
        'tester_id',
        'priority_id',
        'severity_id',
        'status_id',
        'created_at',
        'updated_at',
        'resolved_at',
    ];

    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }
    public function tester()
    {
        return $this->belongsTo(User::class, 'tester_id');
    }

    public function app(){
        return $this->belongsTo(App::class, 'app_id');
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class, 'priority_id');
    }
    public function severity()
    {
        return $this->belongsTo(Severity::class, 'severity_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function activities()
    {
        return $this->hasMany(TicketActivity::class);
    }

    public function chats()
    {
        return $this->hasMany(TicketChat::class);
    }

    public function type()
    {
        return $this->belongsTo(TicketType::class, 'type_id');
    }


}
