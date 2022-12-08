<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachRecipeAddon extends Model
{
    use HasFactory;
    protected $table = 'coach_recipe_addon';

    protected $fillable = [
        'coach_recipe_id',
        'type',
        'type_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'coach_recipe_id' => 'integer',
        'type_id' => 'integer'
    ];
}
