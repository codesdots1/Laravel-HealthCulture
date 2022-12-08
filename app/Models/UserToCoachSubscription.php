<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToCoachSubscription extends Model
{
    use HasFactory;
    protected $table = 'user_to_coach_subscription';

    protected $fillable = [
        'coach_id',
        'user_id',
        'transaction_id',
        'start_subscription_date',
        'end_subscription_date'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'coach_id' => 'integer',
        'transaction_id' => 'integer',
        'user_id' => 'integer'
    ];
}
