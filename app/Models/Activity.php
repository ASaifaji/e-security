<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper method to quickly log activities
    public static function log($description, $type = 'primary')
    {
        if (Auth::check()) {
            self::create([
                'user_id' => Auth::id(),
                'type' => $type,
                'description' => $description,
            ]);
        }
    }
}