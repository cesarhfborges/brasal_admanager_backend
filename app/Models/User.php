<?php

namespace App\Models;

use Adldap\Laravel\Traits\HasLdapUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasLdapUser;

    protected $fillable = [
        'objectguid',
        'name',
        'email',
        'username',
        'password',
        'dn',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'api_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function id()
    {
        return $this->id;
    }

    public function dn()
    {
        return $this->dn;
    }

    public function email()
    {
        return $this->email;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
//        return [
//            'name' => $this->name,
//            'email' => $this->email,
//        ];
        return [];
    }

//    public static function find() {
//        return false;
//    }
}
