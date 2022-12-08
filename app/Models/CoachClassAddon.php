<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachClassAddon extends Model
{
    use HasFactory;
    protected $table = 'coach_class_addon';
    protected $fillable = [
        'coach_class_id',
        'type',
        'type_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'coach_class_id' => 'integer',
        'type_id' => 'integer'
    ];
}
