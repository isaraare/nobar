<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table="users";
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username','email', 'password','type_user',"user_positions_id","menu_roles",
        'staff_all', 'staff_order','staff_vieworder', 'staff_updateorder',
        'staff_deleteorder',
        'cashier_all','cashier_checkbill', 'cashier_viewbill', 'cashier_report',
        'cashier_deletereport',
        'manage_all', 'manage_viewmenu',
        'manage_addmenu', 'manage_updatemenu','manage_deletemenu', 'manage_booktable',
        'manage_viewbooktable', 'manage_updatebooktable','manage_deletebooktable', 'admin_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function position()
    {
        //สร้างความสัมพันธ์  ตาราง User และ position
        return $this->belongsTo(position::class,'user_positions_id','id');
    }
}
