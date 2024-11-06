<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;

    /**
     * Get the identifier that will be stored in the JWT subject claim.
     *
     * @return mixed
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get custom claims for the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
