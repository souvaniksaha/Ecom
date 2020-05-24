<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticable
{
    use Notifiable;
    protected $guard = 'admin';
    public $timestamps = false;
    protected $fillable = ['name' ,'email','password','mobile','image','status','type'];
    protected $hidden = ['password','remember_token'];
}
