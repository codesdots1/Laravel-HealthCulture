<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeMaster extends Model
{
    use HasFactory;
    protected $table = 'code_master';


    protected $fillable = [
        'code',
        'code_flag',
        'user_id',  
        'signup_form_counter',
        'email_image',
        'trailer_counter'
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
