<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamousPlace extends Model
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
