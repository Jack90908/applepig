<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depot extends Model
{
    protected $table = 'depots';

    protected $fillable = [
        'kind', 'depot_total', 'depot_price'
    ];
}
