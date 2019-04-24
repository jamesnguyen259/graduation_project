<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Event extends Model
{
    public function wishlists()
    {
        return $this->morphToMany(User::class, 'wishlistable');
    }

    public function wishlistedBy(User $user)
    {
        return $this->wishlists->contains($user);
    }
}
