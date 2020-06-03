<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseRecord extends Model
{
    protected $table = 'purchase_record';

    protected $fillable = [
        'id','purchase_id','quantity','from','shipping_id','created_at','updated_at'
    ];
}
