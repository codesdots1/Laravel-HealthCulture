<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachRecipe extends Model
{
    use HasFactory;

    protected $table = 'coach_recipe';
    protected $fillable = [
        'coach_id',
        'thumbnail_image',
        'title',
        'sub_title',
        'duration',
        'recipe_step',
        'qty_ingredient'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'status'
    ];

    protected $casts = [
        'id' => 'integer',
        'coach_id' => 'integer'
    ];
}
