<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function workouts()
    {
        return $this->hasMany(Workout::class);
    }

    public function nutritionPlans()
    {
        return $this->hasMany(NutritionPlan::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}

