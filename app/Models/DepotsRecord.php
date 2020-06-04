<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepotsRecord extends Model
{
    protected $table = 'depots_record';

    protected $fillable = [
        'depots_id', 'transaction_id', 'move_total', 'kind' , 'action', 'created_at'
    ];
}
