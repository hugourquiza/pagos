<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon;

class Payment extends Model
{
    public function save(array $options=[]) {
        if(isset($this->date_paid)) {
            $now=Carbon::now('America/Buenos_Aires');
            $date=Carbon::parse($this->date_paid.' 23:59:59','America/Buenos_Aires');
            
            if($now->gt($date))
                throw new \InvalidArgumentException("Date can't be in the past");
        } else {
            throw new \InvalidArgumentException("Name not set");
        }
        
        if(isset($this->amount)) {
            if($this->amount<=0)
                throw new \InvalidArgumentException("Amount must be greater than zero");
        } else {
            throw new \InvalidArgumentException("Amount not set");
        }
                
        return parent::save($options);
    }
}
