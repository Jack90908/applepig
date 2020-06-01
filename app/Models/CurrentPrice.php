<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrentPrice extends Model
{
    protected $table = 'current_prices';

    protected $fillable = [
        'date', 'amount',
    ];
}
