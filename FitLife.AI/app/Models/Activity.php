<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['user_id', 'activity_type', 'distance', 'calories_burned', 'start_time', 'end_time', 'route_data'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

