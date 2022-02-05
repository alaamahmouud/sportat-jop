<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Nagy\LaravelRating\Traits\Vote\CanVote;

class Guest extends Authenticatable
{

    use HasApiTokens , CanVote ;
    protected $table = 'guests';
    public $timestamps = true;

    protected $guarded = [] ;
    public function views()
    {
        return $this->hasMany(View::class);
    }


    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
