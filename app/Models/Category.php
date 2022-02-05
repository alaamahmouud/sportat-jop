<?php

namespace App\Models;

use App\Traits\GetAttribute;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use LogTrait;
    use GetAttribute;
    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name', 'is_active');

    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }


    public function scopeActive($query)
    {

        return $query->whereIsActive(1);
    }

}
