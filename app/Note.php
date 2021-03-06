<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function setTitleAttribute($value)	
    {
    	return $this->attributes['title'] = ucfirst($value);
    }

    public function setBodyAttribute($value)	
    {
    	return $this->attributes['body'] = ucfirst($value);
    }
}
