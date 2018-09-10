<?php

namespace App;

use Validator;

trait Validation
{
    public function validate($data)
    {
        $v = Validator::make($data, $this->rules);

        if ($v->fails()) {        
            $this->errors = $v->errors;
            return false;
        }

        return true;
    }

    public function errors() {
        return $this->errors;
    }
}
