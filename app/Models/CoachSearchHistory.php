<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachSearchHistory extends Model
{
    use HasFactory;
    protected $table = 'coach_search_history';

    protected $fillable = [
        'user_id',
        'search_coach_id',
        'updated_at'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer'
    ];
}
