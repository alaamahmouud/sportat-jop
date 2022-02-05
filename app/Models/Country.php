<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model 
{

    use LogTrait;
    protected $table = 'countries';
    public $timestamps = true;
    protected $fillable = array('name', 'is_active');

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

}