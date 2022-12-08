<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachRecipeDownload extends Model
{
    use HasFactory;
    protected $table = 'coach_recipe_download';
    protected $fillable = [
        'coach_recipe_id',
        'user_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'coach_recipe_id' => 'integer',
        'user_id' => 'integer'
    ];
}
