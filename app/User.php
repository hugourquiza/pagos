<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    
    use Notifiable;
    
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
    
    public function save(array $options=[]) {
        if(isset($this->name)) {
            if($this->name=='')
                throw new \InvalidArgumentException("Name is empty");
        } else {
            throw new \InvalidArgumentException("Name not set");
        }
        
        if(isset($this->email)) {
            if($this->email=='')
                throw new \InvalidArgumentException("Email is empty");
        } else {
            throw new \InvalidArgumentException("Email not set");
        }
        
        if(isset($this->age)) {
            if($this->age<18)
                throw new \InvalidArgumentException("Age must be greater than 18 ");
        } else {
            throw new \InvalidArgumentException("Age not set");
        }
        
        return parent::save($options);
    }
}
