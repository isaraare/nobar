<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $table="menuses";
    protected $fillable = [
        'id', 'menu', 'price','foodcategoryid','created_at','updated_at'
    ];
    public function foodCategory()
    {
        //สร้างความสัมพันธ์  ตาราง Menus และ foodCategory
        return $this->hasMany(foodCategory::class,'foodcategoryid','foodcategoryid');
    }
}
