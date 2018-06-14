<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    protected $table="user_positions";
    protected $fillable = [
        'id', 'name', 'index','created_at','updated_at'

    ];

}
