<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    //protected $table = 'users';
    protected $primaryKey = 'users_id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * User can have many article
     */

    public function articles($param) {

        return $this->hasMany('App\Article');
    }

    /*
     * 
     */

    public function isATeamManager() {

        return true;
    }

}
