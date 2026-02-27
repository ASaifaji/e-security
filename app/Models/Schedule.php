<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'event_type',
        'app_id',
        'pic_id',
        'bg_color',
        'start_date',
        'end_date',
    ];

    public function application()
    {
        return $this->belongsTo(App::class, 'app_id');
    }

    public function pic()
    {
        return $this->belongsTo(User::class, 'pic_id');
    }
}
