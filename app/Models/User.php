<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Boolean;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'display_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getUserByID(BigInteger $id): User
    {
        return User::where('id', $id)->first();
    }

    public function createUser(array $user): User
    {
        return User::create($user);
    }

    public function updateUser(array $user): bool
    {
        return User::where('id', $user['id'])->update($user);
    }
}
