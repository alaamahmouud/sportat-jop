<?php

namespace App\Models;

use App\Traits\GetAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Nagy\LaravelRating\Traits\Vote\CanVote;


class Client extends Authenticatable
{
    use HasApiTokens , GetAttribute,CanVote;

    use LogTrait;
    use GetAttribute;
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('email', 'phone', 'relative_phone', 'd_o_b', 'password', 'provider_user_id', 'provider', 'pin_code', 'pin_code_date_expired', 'first_name', 'last_name', 'gender', 'nationalty_id', 'country_id', 'type_identifier', 'expiration_date', 'number_identifier', 'bio');

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function nationalty()
    {
        return $this->belongsTo('App\Models\Nationalty');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->multiple_attachment = true;
        $this->multiple_attachment_usage = ['default', 'bdf-file'];
    }
    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }


    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    public function morphNotifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

}
