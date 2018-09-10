<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use \App\Validation;

class User extends Authenticatable
{
    protected $rules=[
        'name'=>'required',
        'email'=>'required|unique:users,email|email',
        'age'=>'required|numeric|min:18',
        'password'=>'required|confirmed|min:5'
    ];
    
    protected $validator;  
    
    use Notifiable;
    use Validation;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function favorites() {
        return $this->hasMany('\App\Favorites');
    }
}
