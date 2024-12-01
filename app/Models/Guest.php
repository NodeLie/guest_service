<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;
    protected $table = 'guest';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'country',
    ];
}