<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function travelposts()
    {
        return $this->hasMany(Travelpost::class);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Travelpost::class,'favorites','user_id','travelpost_id');
    }
    
    public function favorite($travelpostId)
    {
        $exist = $this->is_favoriting($travelpostId);
        
        if($exist){
            return false;
        } else{
            $this->favorites()->attach($travelpostId);
            return true;
        }
    }
    
     public function unfavorite($travelpostId)
     {
        $exist = $this->is_favoriting($travelpostId);
        if($exist){
            $this->favorites()->detach($travelpostId);
            return true;
        } else{
            return false;
        }
     }
     
     public function is_favoriting($travelpostId)
    {
        return $this->favorites()->where('travelpost_id', $travelpostId)->exists();
    }
}
