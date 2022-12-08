<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachRecipeRating extends Model {

    use HasFactory;

    protected $table = 'coach_recipe_rating';
    protected $fillable = [
        'coach_recipe_id',
        'user_id',
        'rating',
        'comments',
        'created_at'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'id' => 'integer',
        'coach_recipe_id' => 'integer',
        'user_id' => 'integer',
        'rating' => 'double'
    ];

}
