<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{

    protected $table = "views" ;
    protected  $fillable = array('guest_id','client_id','video_id');
    public $timestamps = true ;


    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }


    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function video()
    {
        return $this->belongsTo(Video::class);
    }
    //
}
