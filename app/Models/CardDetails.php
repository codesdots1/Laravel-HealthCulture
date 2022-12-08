<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardDetails extends Model
{
    use HasFactory;
    protected $table = 'card_details';

    protected $fillable = [
        'user_id',
        'card_type',
        'card_number',
        'card_holder_name',
        'expiration_date',
        'cvv'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer'
    ];
}
