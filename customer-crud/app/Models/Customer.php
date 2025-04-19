<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
    ];
}
