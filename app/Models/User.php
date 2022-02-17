<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getFullname()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function AccountType()
    {
        return $this->hasMany(AccountType::class);
    }


    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }



    public function getAvatar()
    {
        return 'https://www.gravatar.com/avatar/' .md5($this->email);
    }

    public  function permission(){

        return $this->hasMany(Permission::class);
    }

    public function role(){
        return $this->belongsToMany('App\Models\Role','role_users','user_id','role_id');
    }

    public function isSuperAdmin(){
        return  $this->id == 1;
    }


    public function account()
    {
        return $this->hasOne(Account::class);
    }


    public function hasAccess(array $permission)
    {

        $array = array();

        foreach($this->role as $role)
        {
            $permissions = $role->hasAccess();
            foreach($permissions as $key=>$value)
            {
                $array[]  = ($key);
            }

        }

        $name  = implode($permission);
        if(in_array($name,$array)){
            return true;
        }
        else
        {
            return false;
        }
    }

}
