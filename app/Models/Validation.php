<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{    
        protected $table = 'settings_validations';
        public $timestamps = true;
        protected $fillable = ['value','setting_id'];
    
        public function setting()
        {
            return $this->belongsTo('App\Models\Setting');
        }
}
    