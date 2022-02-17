<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function user()
    {
        return $this->belongsToMany('App\User','role_users');
    }

    public function hasAccess()
    {
        return $this->hasPermission();
    }

    public function hasPermission()
    {

        $permissions  = json_decode($this->permissions,true);
        return $permissions;
    }
}
