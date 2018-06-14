<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'id', 'id_menus', 'staff','table','amount','created_at'

    ];
    public function Menus()
    {
        //สร้างความสัมพันธ์  ตาราง Menus และ Orders
        return $this->hasMany(Menus::class,'id','id_menus');
    }
}
