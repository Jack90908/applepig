<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchase';

    protected $fillable = [
        'kind','current_price','unit_price','origin_total','suplus_total','client_id','transaction_time'
    ];
}
