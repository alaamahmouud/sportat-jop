<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';
    protected $guarded = [] ;
    public $timestamps = true;

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }


    public function guest()
    {
        return $this->belongsTo('App\Models\Guest');
    }

    public function vedios()
    {
        return $this->belongsTo(Video::class);
    }

}
