<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    public function other_user() {
        return $this->belongsTo('\App\User','other_user_id');
    }
}
