<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Posts Relationship
    public function posts() {
    	return $this->belongsToMany('App\Models\Post');
    }
}
