<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public $incrementing = false;

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reports(){
        return $this->hasMany('App\Report');
    }

}
