<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'roles',
        'name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     
    /**public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }*/

    public function roles(){
        return $this->belongsToMany('App\Models\Roles');
    }

    //Check if user has a role 
    public function hasAnyRole(string $role){
        return null !== $this->roles()->where('name',$role)->first();
    }

    //Check if user has any role which is an array
    public function hasAnyRoles(array $role){
      return null !== $this->roles()->whereIn('name',$role)->first();
    }
}
