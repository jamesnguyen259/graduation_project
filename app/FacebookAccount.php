<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class FacebookAccount extends Model
{
    protected $fillable = ['user_id', 'provider', 'provider_id'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
