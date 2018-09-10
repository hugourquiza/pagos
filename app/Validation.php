<?php

namespace App;

use Validator;

trait Validation
{
    public function validate($data)
    {
        $v = Validator::make($data, $this->rules);
        
        
        if ($v->fails()) {        
            $this->validator = $v;
            return false;
        }

        return true;
    }

    public function validator() {
        return $this->validator;
    }
}
