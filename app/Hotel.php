<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Hotel extends Model
{
    public function wishlists()
    {
        return $this->morphToMany(User::class, 'wishlistable');
    }

    public function wishlistedBy(User $user)
    {
        return $this->wishlists->contains($user);
    }

    public function scopeIsWithinMaxDistance($query, $lat, $lng, $radius)
    {
        $haversine = "(6371 * acos(cos(radians($lat))
            * cos(radians(hotels.lat))
            * cos(radians(hotels.lng)
            - radians($lng))
            + sin(radians($lat))
            * sin(radians(hotels.lat))))";
        return $query
        ->select('hotels.*')
        ->selectRaw("{$haversine} AS distance")
        ->whereRaw("{$haversine} < ?", [$radius]);
    }
}
