<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GetAttribute;
use Nagy\LaravelRating\Traits\Vote\Votable;

class Video extends Model
{
    use GetAttribute,Votable;
    protected $table = 'videos';
    public $timestamps = true;
    protected $fillable = array('title', 'description', 'category_id', 'tags' ,'client_id');

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->multiple_attachment = true;
        $this->multiple_attachment_usage = ['default', 'bdf-file'];
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

}
