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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Role(){
        return $this->belongsTo(Role::class);
    }

    public function Transaction(){
        return $this->hasMany(Order::class);
    }

    public function Cart(){
        $var = $this->belongsToMany(Tea::class,'carts','user_id','tea_id')->withPivot('quantity')->withTimestamps();
        return $var->pivot;
    }

    public function Review(){
        $var = $this->belongsToMany(Tea::class,'reviews','user_id','tea_id')->withPivot('rating','review')->withTimestamps();
        return $var->pivot;
    }
}
