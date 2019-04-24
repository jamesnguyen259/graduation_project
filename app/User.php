<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Event;
use App\Hotel;
use App\Restaurant;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'name' , 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wishlistEvents()
    {
        return $this->morphedByMany(Event::class, 'wishlistable')
                    ->withPivot(['created_at'])
                    ->orderBy('pivot_created_at', 'desc');
    }

    public function wishlistHotels()
    {
        return $this->morphedByMany(Hotel::class, 'wishlistable')
                    ->withPivot(['created_at'])
                    ->orderBy('pivot_created_at', 'desc');
    }

    public function wishlistRestaurants()
    {
        return $this->morphedByMany(Restaurant::class, 'wishlistable')
                    ->withPivot(['created_at'])
                    ->orderBy('pivot_created_at', 'desc');
    }

    public function wishlistFamousPlaces()
    {
        return $this->morphedByMany(FamousPlace::class, 'wishlistable')
                    ->withPivot(['created_at'])
                    ->orderBy('pivot_created_at', 'desc');
    }
}
