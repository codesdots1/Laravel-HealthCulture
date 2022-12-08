<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter_subscribe extends Model
{
    use HasFactory;
    protected $table = 'newsletter_subscribe';


    protected $fillable = [
        'email',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
     ];

    protected $casts = [
        'id' => 'integer'
    ];
}
