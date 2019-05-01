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

    public function scopeIsWithinMaxDistance($query, $lat, $lng, $radius)
    {
        $haversine = "(6371 * acos(cos(radians($lat))
            * cos(radians(events.lat))
            * cos(radians(events.lng)
            - radians($lng))
            + sin(radians($lat))
            * sin(radians(events.lat))))";
        return $query
        ->select('events.*')
        ->selectRaw("{$haversine} AS distance")
        ->whereRaw("{$haversine} < ?", [$radius]);
    }
}
