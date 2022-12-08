<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $table = 'equipment';

    protected $fillable = [
        'equipment_name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'status'
    ];
    protected $casts = [
        'id' => 'integer'
    ];
}
