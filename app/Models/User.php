<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
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

    public function hasRole($role) {
        return $this->role == $role;
    }

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function holidays()
    {
        return $this->hasMany(Holiday::class);
    }

    public static function positions() {
        return Position::all();
    }
}
