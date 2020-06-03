<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IronKind extends Model
{
    protected $table = 'iron_kind';

    protected $fillable = [
        'id', 'name'
    ];
}
