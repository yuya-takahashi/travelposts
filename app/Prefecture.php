<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    public function travelposts()
    {
        return $this->hasMany(Travelpost::class);
    }
}
