<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToCoachClassSubscription extends Model
{
    use HasFactory;
    protected $table = 'user_to_coach_class_subscription';

    protected $fillable = [
        'coach_class_id',
        'transaction_id',
        'user_id',
        'subscription_date',
        'attended'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'coach_class_id' => 'integer',
        'transaction_id' => 'integer',
        'user_id' => 'integer',
        'attended' => 'boolean'
    ];
}
