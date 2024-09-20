<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NutritionPlan extends Model
{
    protected $fillable = ['user_id', 'date', 'meal_type', 'description', 'ingredients'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
