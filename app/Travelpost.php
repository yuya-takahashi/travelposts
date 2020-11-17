<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travelpost extends Model
{
    protected $fillable = ['file', 'prefecture_id', 'comment'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
}
