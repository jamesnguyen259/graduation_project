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

    public function scopeIsWithinMaxDistance($query, $lat, $lng, $radius)
    {
        $haversine = "(6371 * acos(cos(radians($lat))
            * cos(radians(famous_places.lat))
            * cos(radians(famous_places.lng)
            - radians($lng))
            + sin(radians($lat))
            * sin(radians(famous_places.lat))))";
        return $query
        ->select('famous_places.*')
        ->selectRaw("{$haversine} AS distance")
        ->whereRaw("{$haversine} < ?", [$radius]);
    }
}
