<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\Admin\ResetPassword;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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
        'password' => 'hashed',
    ];

    /**
     * Auto hash password when create/update
     *
     * @param $value
     * @return void
     */

     public function setPasswordAttribute($value)
     {
         $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
     }
 
 /**
      * Send the password reset link notification.
      *
      * @param $token
      * @return void
      */
     public function sendPasswordResetNotification($token)
     {
         $this->notify(new ResetPassword($token));
     }
}
