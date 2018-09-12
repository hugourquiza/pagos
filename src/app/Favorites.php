<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    public $timestamps=false;
            
    public function save(array $options=[]) {
        $u=\App\User::find($this->user_id);
        $other_user=\App\User::find($this->other_user_id);
        
        if(!isset($u->id))
            throw new \InvalidArgumentException("User doesn't exist");
        
        if(!isset($other_user))
            throw new \InvalidArgumentException("Target user doesn't exist");
        
        return parent::save($options);
    }
}
