<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundationi\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'passwprd'
    ];
}
