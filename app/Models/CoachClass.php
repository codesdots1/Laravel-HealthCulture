<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachClass extends Model
{
    use HasFactory;
    protected $table = 'coach_class';

    protected $casts = [
        'id' => 'integer',
        'coach_id' => 'integer',
        'class_type_id' => 'integer',
        'class_difficulty_id' => 'integer',
        'subscriber_fee' => 'double',
        'non_subscriber_fee' => 'double',
        'burn_calories' => 'integer',
    ];

    protected $fillable = [
        'coach_id',
        'coach_class_type',
        'class_subtitle',
        'thumbnail_image',
        'thumbnail_video',
        'class_type_id',
        'class_difficulty_id',
        'class_date',
        'class_time',
        'duration',
        'subscriber_fee',
        'non_subscriber_fee',
        'base_currency',
        'burn_calories',
        'description',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
