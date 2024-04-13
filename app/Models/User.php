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

    public function orders()
    {
        return User::hasMany(Order::class, 'user_id', 'id');
    }

    public function payments()
    {
        return User::hasMany(Payment::class, 'user_id', 'id');
    }

    public function reviews()
    {
        return User::hasMany(Review::class, 'user_id', 'id');
    }

    public function wishlists()
    {
        return User::hasMany(Wishlist::class, 'user_id', 'id');
    }

    public function get_user_by_id(int  $id): User
    {
        return User::where('id', $id)->first();
    }

    public function create_user(array $user): User
    {
        return User::create($user);
    }

    public function update_user(User $user): bool
    {
        return $user->save();
    }
}
