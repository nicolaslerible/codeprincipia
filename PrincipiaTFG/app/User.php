<?php

namespace App;

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
    protected $fillable = [
        'name', 'email', 'password', 'codRol'
    ];

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

    //Enlaza tabla "Role" con tabla "User" 
    public function role(){
        return $this->belongsTo('App\Role', 'codRol');
    }

    public function esAdmin(){
        if($this->codRol == 1){
            return true;
        }
        return false;
    }

    public function getId(){
        return $this->id;
    }

    public function scopeBuscarpor($query, $tipo, $info) {
    	if ( ($tipo) && ($info) ) {
    		return $query->where($tipo,'like',"%$info%");
    	}
    }

}
