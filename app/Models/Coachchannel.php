<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coachchannel extends Model
{
    use HasFactory;
    protected $table = 'coach_channel';


    protected $fillable = [
        'coach_id',
        'ingest_endpoint',
        'playbackurl',
        'streamdata',
        'channel_details'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'id' => 'integer',
        'coach_id' => 'integer'
    ];
}
